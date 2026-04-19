<?php

declare(strict_types=1);

namespace Plaidly;

use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Http\Client\Common\PluginClient;
use Http\Client\Curl\Client as CurlClient;
use Nyholm\Psr7\Factory\Psr17Factory;
use Plaidly\Exception\PlaidlyException;
use Plaidly\Generated\Client as GeneratedClient;
use Plaidly\Generated\Model\Error as ApiError;
use Plaidly\Generated\Model\Merchant;
use Plaidly\Generated\Model\PaymentSession;
use Plaidly\Generated\Model\Payout;
use Plaidly\Generated\Model\RegisterMerchantRequest;
use Plaidly\Generated\Model\CreatePaymentSessionRequest;
use Plaidly\Generated\Model\RequestPayoutRequest;
use Plaidly\Generated\Model\CreateWalletRequest;
use Plaidly\Generated\Model\Wallet;
use Plaidly\Generated\Model\Transaction;
use Psr\Http\Message\ResponseInterface;

/**
 * Official Plaidly PHP SDK client.
 *
 * Types and the low-level HTTP endpoints are auto-generated from the
 * Plaidly OpenAPI 3.1 specification (see `spec/openapi.yaml`, regenerate
 * with `composer generate`). This class is a hand-written wrapper that:
 *
 *  - uses a cURL-backed PSR-18 client (php-http/curl-client),
 *  - injects the X-API-Key header via a PSR-7 header-defaults plugin,
 *  - retries up to 3 times on transient 5xx / network failures,
 *  - translates non-2xx responses into a typed {@see PlaidlyException}.
 *
 * Usage:
 *
 * ```php
 * $client = new \Plaidly\PlaidlyClient($_ENV['PLAIDLY_API_KEY']);
 * $session = $client->createPaymentSession(new \Plaidly\Generated\Model\CreatePaymentSessionRequest([
 *     'amount'        => 10.00,
 *     'expiresIn'     => '15m',
 *     'paymentMethod' => new \Plaidly\Generated\Model\PaymentMethod([
 *         'methodID' => 0, 'chain' => 'solana', 'token' => 'USDC', 'network' => 'mainnet',
 *     ]),
 * ]));
 * ```
 */
final class PlaidlyClient
{
    private GeneratedClient $generated;

    public function __construct(
        string $apiKey,
        string $baseUrl = 'https://api.plaidly.io',
        int $timeoutSeconds = 30,
    ) {
        if ($apiKey === '') {
            throw new \InvalidArgumentException('apiKey must not be empty');
        }

        $psr17 = new Psr17Factory();
        $curl  = new CurlClient($psr17, $psr17, [
            CURLOPT_TIMEOUT => $timeoutSeconds,
        ]);

        $plugins = [
            new HeaderDefaultsPlugin([
                'X-API-Key' => $apiKey,
                'Accept'    => 'application/json',
            ]),
            // Retry up to 3 attempts on transient 5xx / network errors with
            // exponential backoff (0.5s, 1s).
            new RetryPlugin([
                'retries'           => 2,
                'error_response_delay' => static function (int $retries): int {
                    return (int) (2 ** $retries * 500000);
                },
            ]),
            new Plugin\BaseUriPlugin($psr17->createUri(rtrim($baseUrl, '/'))),
        ];
        $psr18 = new PluginClient($curl, $plugins);

        $this->generated = GeneratedClient::create($psr18);
    }

    /** @return GeneratedClient underlying generated client (escape hatch) */
    public function raw(): GeneratedClient
    {
        return $this->generated;
    }

    public function registerMerchant(RegisterMerchantRequest $body): Merchant
    {
        /** @var Merchant|ApiError|null $result */
        $result = $this->generated->registerMerchant($body);
        return $this->unwrap($result, Merchant::class);
    }

    public function getMe(): Merchant
    {
        $result = $this->generated->getMe();
        return $this->unwrap($result, Merchant::class);
    }

    public function createPaymentSession(CreatePaymentSessionRequest $body): PaymentSession
    {
        $result = $this->generated->createPaymentSession($body);
        return $this->unwrap($result, PaymentSession::class);
    }

    public function createDemoPaymentSession(): PaymentSession
    {
        $result = $this->generated->createDemoPaymentSession();
        return $this->unwrap($result, PaymentSession::class);
    }

    public function getPaymentSession(string $sessionId): PaymentSession
    {
        $result = $this->generated->getPaymentSession($sessionId);
        return $this->unwrap($result, PaymentSession::class);
    }

    public function fulfillDemoPaymentSession(string $sessionId): void
    {
        $result = $this->generated->fulfillDemoPaymentSession($sessionId);
        if ($result instanceof ApiError) {
            throw new PlaidlyException($result->getMessage() ?? 'API error', 0, 'API_ERROR');
        }
    }

    /**
     * Fetch the PDF receipt as a raw binary string.
     * The endpoint returns application/pdf, so we request the raw PSR-7 response.
     */
    public function getReceiptPDF(string $sessionId): string
    {
        /** @var ResponseInterface $response */
        $response = $this->generated->getReceiptBySessionID(
            $sessionId,
            GeneratedClient::FETCH_RESPONSE,
        );
        if ($response->getStatusCode() >= 400) {
            throw new PlaidlyException(
                'HTTP ' . $response->getStatusCode(),
                $response->getStatusCode(),
                'RECEIPT_FETCH_FAILED',
            );
        }
        return (string) $response->getBody();
    }

    public function requestPayout(RequestPayoutRequest $body): Payout
    {
        $result = $this->generated->requestPayout($body);
        return $this->unwrap($result, Payout::class);
    }

    public function getPayout(string $payoutId): Payout
    {
        $result = $this->generated->getPayout($payoutId);
        return $this->unwrap($result, Payout::class);
    }

    public function createWallet(CreateWalletRequest $body): Wallet
    {
        $result = $this->generated->createWallet($body);
        return $this->unwrap($result, Wallet::class);
    }

    /** @return Wallet[] */
    public function listWallets(): array
    {
        $result = $this->generated->listWallets();
        if ($result instanceof ApiError) {
            throw $this->apiError($result);
        }
        /** @var Wallet[] $out */
        $out = \is_array($result) ? $result : [];
        return $out;
    }

    public function getWallet(string $walletId): Wallet
    {
        $result = $this->generated->getWallet($walletId);
        return $this->unwrap($result, Wallet::class);
    }

    /** @return Transaction[] */
    public function listTransactions(string $walletId): array
    {
        $result = $this->generated->listTransactions($walletId);
        if ($result instanceof ApiError) {
            throw $this->apiError($result);
        }
        /** @var Transaction[] $out */
        $out = \is_array($result) ? $result : [];
        return $out;
    }

    /**
     * @template T of object
     * @param  mixed $result
     * @param  class-string<T> $expected
     * @return T
     * @throws PlaidlyException
     */
    private function unwrap(mixed $result, string $expected): object
    {
        if ($result instanceof $expected) {
            return $result;
        }
        if ($result instanceof ApiError) {
            throw $this->apiError($result);
        }
        if ($result === null) {
            throw new PlaidlyException(
                'empty response body',
                0,
                'EMPTY_BODY',
            );
        }
        throw new PlaidlyException(
            'unexpected response type: ' . get_debug_type($result),
            0,
            'UNEXPECTED_RESPONSE',
        );
    }

    private function apiError(ApiError $err): PlaidlyException
    {
        return new PlaidlyException(
            $err->getMessage() ?? 'API error',
            0,
            'API_ERROR',
        );
    }
}
