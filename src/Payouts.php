<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Operations on payouts (/v1/payouts).
 */
final class Payouts
{
    public function __construct(private readonly HttpClientInterface $http)
    {
    }

    /**
     * Request a new payout.
     *
     * @param string $destinationAddress Blockchain address to send the payout to.
     * @param float  $amount             Amount to pay out.
     * @param string $tokenSymbol        Token symbol, e.g. "SOL", "ETH".
     * @param string $network            Blockchain network, e.g. "solana", "ethereum".
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function create(
        string $destinationAddress,
        float $amount,
        string $tokenSymbol,
        string $network,
    ): array {
        return $this->http->post('/v1/payouts', [
            'destination_address' => $destinationAddress,
            'amount'              => $amount,
            'token_symbol'        => $tokenSymbol,
            'network'             => $network,
        ]);
    }

    /**
     * Get payout status by ID.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function get(string $payoutId): array
    {
        return $this->http->get('/v1/payouts/' . rawurlencode($payoutId));
    }
}
