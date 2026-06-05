<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Sandbox-only helpers (/v1/sandbox). Public endpoints.
 */
final class Sandbox
{
    public function __construct(private readonly HttpClientInterface $http)
    {
    }

    /**
     * List testnet faucet URLs per chain/network.
     *
     * @return array<string, string> Map of "chain:network" to faucet URL.
     * @throws PlaidlyException
     */
    public function faucets(): array
    {
        /** @var array<string, string> */
        return $this->http->get('/v1/sandbox/faucets');
    }
}
