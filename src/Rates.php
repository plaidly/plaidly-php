<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * USD spot rates for supported assets (/v1/rates). Public endpoint.
 */
final class Rates
{
    public function __construct(private readonly HttpClientInterface $http)
    {
    }

    /**
     * Get USD spot rates.
     *
     * @param list<string> $symbols Optional symbols to filter, e.g. ["ETH", "SOL"].
     *                              Omit for all. Stablecoins are fixed at 1.0.
     * @return list<array<string, mixed>>
     * @throws PlaidlyException
     */
    public function get(array $symbols = []): array
    {
        $query = [];
        if ($symbols !== []) {
            $query['symbols'] = implode(',', $symbols);
        }

        /** @var list<array<string, mixed>> */
        return $this->http->get('/v1/rates', $query);
    }
}
