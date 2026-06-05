<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Operations on payouts.
 */
final class Payouts
{
    public function __construct(private readonly HttpClient $http) {}

    /**
     * Request a payout.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function create(
        string $amount,
        string $currency,
        string $chain,
        string $address,
        string $network = 'mainnet',
    ): array {
        return $this->http->post('/v1/payouts', [
            'amount'   => $amount,
            'currency' => $currency,
            'chain'    => $chain,
            'network'  => $network,
            'address'  => $address,
        ]);
    }

    /**
     * Fetch a payout by ID.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function get(string $id): array
    {
        return $this->http->get('/v1/payouts/' . rawurlencode($id));
    }
}
