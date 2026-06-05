<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Sandbox-only helpers.
 */
final class Sandbox
{
    public function __construct(private readonly HttpClient $http) {}

    /**
     * Return available testnet faucets.
     *
     * @return array<int, array<string, string>>
     * @throws PlaidlyException
     */
    public function faucets(): array
    {
        /** @var array<int, array<string, string>> */
        return $this->http->get('/v1/sandbox/faucets');
    }
}
