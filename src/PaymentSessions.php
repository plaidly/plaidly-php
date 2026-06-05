<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Operations on payment sessions (/v1/payment_sessions).
 *
 * @phpstan-type PaymentSessionArray array<string, mixed>
 */
final class PaymentSessions
{
    /** Crypto payment method (methodID 0). */
    public const METHOD_CRYPTO = 0;

    /** Fiat payment method (methodID 1). */
    public const METHOD_FIAT = 1;

    public function __construct(private readonly HttpClientInterface $http)
    {
    }

    /**
     * Create a payment session.
     *
     * @param float                $amount    Expected amount to be paid.
     * @param string               $expiresIn Duration until the session expires, e.g. "15m", "1h".
     * @param string               $chain     Blockchain, e.g. "ethereum", "solana", "tron".
     * @param string               $token     Token symbol, e.g. "USDC", "ETH", "SOL".
     * @param string               $network   "mainnet" or "testnet".
     * @param array<string, mixed> $metadata  Optional key-value metadata (max 4KB).
     * @param int                  $methodId  Payment method kind (0 = crypto, 1 = fiat).
     * @return PaymentSessionArray
     * @throws PlaidlyException
     */
    public function create(
        float $amount,
        string $expiresIn,
        string $chain,
        string $token,
        string $network = 'mainnet',
        array $metadata = [],
        int $methodId = self::METHOD_CRYPTO,
    ): array {
        $body = [
            'amount'        => $amount,
            'expires_in'    => $expiresIn,
            'paymentMethod' => [
                'methodID' => $methodId,
                'chain'    => $chain,
                'token'    => $token,
                'network'  => $network,
            ],
        ];

        if ($metadata !== []) {
            $body['metadata'] = $metadata;
        }

        return $this->http->post('/v1/payment_sessions', $body);
    }

    /**
     * Fetch a payment session by ID. Public endpoint used for checkout polling.
     *
     * @return PaymentSessionArray
     * @throws PlaidlyException
     */
    public function get(string $sessionId): array
    {
        return $this->http->get('/v1/payment_sessions/' . rawurlencode($sessionId));
    }

    /**
     * Create a public demo payment session.
     *
     * @param string|null $chain   Optional blockchain.
     * @param string|null $token   Optional token symbol.
     * @param string|null $network Optional network.
     * @param float|null  $amount  Optional amount.
     * @return PaymentSessionArray
     * @throws PlaidlyException
     */
    public function createDemo(
        ?string $chain = null,
        ?string $token = null,
        ?string $network = null,
        ?float $amount = null,
    ): array {
        $body = array_filter(
            [
                'chain'   => $chain,
                'token'   => $token,
                'network' => $network,
                'amount'  => $amount,
            ],
            static fn (mixed $v): bool => $v !== null,
        );

        return $this->http->post('/v1/payment_sessions/demo', $body);
    }

    /**
     * Instantly complete a demo/sandbox payment session.
     *
     * @return PaymentSessionArray
     * @throws PlaidlyException
     */
    public function simulate(string $sessionId): array
    {
        return $this->http->post('/v1/payment_sessions/' . rawurlencode($sessionId) . '/simulate');
    }
}
