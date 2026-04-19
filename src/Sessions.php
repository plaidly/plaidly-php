<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Operations on payment sessions.
 */
final class Sessions
{
    public function __construct(private readonly HttpClient $http) {}

    /**
     * Create a new payment session.
     *
     * @param string               $amount      Decimal amount string, e.g. "100.00".
     * @param string               $currency    Token symbol, e.g. "USDC".
     * @param string               $chain       Blockchain name, e.g. "solana".
     * @param string               $network     Network name (default: "mainnet").
     * @param string|null          $callbackUrl URL for webhook delivery.
     * @param array<string,string> $metadata    Arbitrary key-value pairs.
     * @param string|null          $idempotencyKey Safe-retry key.
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function create(
        string  $amount,
        string  $currency,
        string  $chain,
        string  $network = 'mainnet',
        ?string $callbackUrl = null,
        array   $metadata = [],
        ?string $idempotencyKey = null,
    ): array {
        $body = [
            'amount'   => $amount,
            'currency' => $currency,
            'chain'    => $chain,
            'network'  => $network,
        ];
        if ($callbackUrl !== null) {
            $body['callback_url'] = $callbackUrl;
        }
        if ($metadata !== []) {
            $body['metadata'] = $metadata;
        }
        if ($idempotencyKey !== null) {
            $body['idempotency_key'] = $idempotencyKey;
        }
        return $this->http->post('/v1/sessions', $body);
    }

    /**
     * Fetch a session by ID.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function get(string $id): array
    {
        return $this->http->get('/v1/sessions/' . rawurlencode($id));
    }

    /**
     * List all sessions for the authenticated merchant.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function list(): array
    {
        return $this->http->get('/v1/sessions');
    }

    /**
     * Simulate a payment for a sandbox session.
     *
     * @throws PlaidlyException
     */
    public function simulate(string $id, ?string $txHash = null): void
    {
        $body = [];
        if ($txHash !== null) {
            $body['tx_hash'] = $txHash;
        }
        $this->http->post('/v1/sessions/' . rawurlencode($id) . '/simulate', $body);
    }
}
