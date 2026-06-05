<?php

declare(strict_types=1);

namespace Plaidly;

use JsonException;
use Plaidly\Exception\ApiException;
use Plaidly\Exception\PlaidlyException;
use Plaidly\Exception\TransportException;

/**
 * cURL-based HTTP client used internally by {@see PlaidlyClient}.
 *
 * Transient failures (cURL transport errors and 5xx responses) are retried
 * with exponential backoff. 4xx responses are surfaced immediately as typed
 * {@see ApiException} subclasses.
 *
 * @internal
 */
final class HttpClient implements HttpClientInterface
{
    private const MAX_ATTEMPTS = 3;

    public function __construct(
        private readonly string $apiKey,
        private readonly string $baseUrl = 'https://api.plaidly.io',
        private readonly int $timeoutSeconds = 30,
        private readonly int $maxRetries = 2,
    ) {
    }

    public function get(string $path, array $query = []): array
    {
        if ($query !== []) {
            $path .= '?' . http_build_query($query);
        }

        return $this->request('GET', $path);
    }

    public function post(string $path, array $body = []): array
    {
        return $this->request('POST', $path, $body);
    }

    /**
     * Execute a request, retrying transient failures with exponential backoff.
     *
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>|list<mixed>
     * @throws PlaidlyException
     */
    private function request(string $method, string $path, ?array $body = null): array
    {
        $attempts = min(self::MAX_ATTEMPTS, 1 + max(0, $this->maxRetries));
        $lastError = null;

        for ($attempt = 0; $attempt < $attempts; $attempt++) {
            if ($attempt > 0) {
                usleep((int) (2 ** $attempt * 500000));
            }

            try {
                return $this->doRequest($method, $path, $body);
            } catch (ApiException $e) {
                $status = $e->getStatusCode();
                if ($status === null || $status < 500) {
                    throw $e;
                }
                $lastError = $e;
            } catch (TransportException $e) {
                $lastError = $e;
            }
        }

        throw $lastError ?? new TransportException('request failed after retries');
    }

    /**
     * Execute a single HTTP request.
     *
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>|list<mixed>
     * @throws PlaidlyException
     */
    private function doRequest(string $method, string $path, ?array $body = null): array
    {
        $ch = curl_init();
        $url = rtrim($this->baseUrl, '/') . $path;

        $headers = [
            'X-API-Key: ' . $this->apiKey,
            'Accept: application/json',
            'Content-Type: application/json',
            'User-Agent: plaidly-php/' . PlaidlyClient::VERSION,
        ];

        $options = [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $this->timeoutSeconds,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_CUSTOMREQUEST  => $method,
        ];

        if ($body !== null) {
            try {
                $options[CURLOPT_POSTFIELDS] = json_encode($body, JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
                curl_close($ch);
                throw new PlaidlyException('failed to encode request body: ' . $e->getMessage(), null, null, [], $e);
            }
        }

        curl_setopt_array($ch, $options);

        $responseBody = curl_exec($ch);
        $statusCode   = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError    = curl_error($ch);
        curl_close($ch);

        if ($responseBody === false || $curlError !== '') {
            throw new TransportException('cURL error: ' . ($curlError !== '' ? $curlError : 'unknown'));
        }

        $decoded = [];
        if (is_string($responseBody) && $responseBody !== '') {
            try {
                $decoded = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
            } catch (JsonException $e) {
                if ($statusCode >= 400) {
                    throw new ApiException('HTTP ' . $statusCode, $statusCode);
                }
                throw new PlaidlyException('failed to decode response body: ' . $e->getMessage(), $statusCode, null, [], $e);
            }
        }

        if ($statusCode >= 400) {
            throw ApiException::fromResponse($statusCode, is_array($decoded) ? $decoded : []);
        }

        return is_array($decoded) ? $decoded : [];
    }
}
