<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Minimal cURL-based HTTP client used internally by PlaidlyClient.
 *
 * @internal
 */
final class HttpClient
{
    public function __construct(
        private readonly string $apiKey,
        private readonly string $baseUrl,
        private readonly int $timeoutSeconds,
    ) {}

    /**
     * Execute a GET request.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function get(string $path): array
    {
        return $this->request('GET', $path);
    }

    /**
     * Execute a POST request.
     *
     * @param array<string, mixed> $body
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function post(string $path, array $body = []): array
    {
        return $this->request('POST', $path, $body);
    }

    /**
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    private function request(string $method, string $path, ?array $body = null): array
    {
        $ch = curl_init();
        $url = rtrim($this->baseUrl, '/') . $path;

        $headers = [
            'X-API-Key: ' . $this->apiKey,
            'Accept: application/json',
            'Content-Type: application/json',
        ];

        curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => $this->timeoutSeconds,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_CUSTOMREQUEST  => $method,
        ]);

        if ($body !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body, JSON_THROW_ON_ERROR));
        }

        $responseBody = curl_exec($ch);
        $statusCode   = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError    = curl_error($ch);
        curl_close($ch);

        if ($curlError !== '') {
            throw new PlaidlyException('cURL error: ' . $curlError, 0);
        }

        $decoded = [];
        if (is_string($responseBody) && $responseBody !== '') {
            $decoded = json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        }

        if ($statusCode >= 400) {
            $message = $decoded['message'] ?? ('HTTP ' . $statusCode);
            $code    = $decoded['code']    ?? 'UNKNOWN_ERROR';
            throw new PlaidlyException((string) $message, $statusCode, (string) $code);
        }

        return is_array($decoded) ? $decoded : [];
    }
}
