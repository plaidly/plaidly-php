<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Read access to enabled payment methods (/v1/payment_methods). Public endpoint.
 */
final class PaymentMethods
{
    public function __construct(private readonly HttpClientInterface $http)
    {
    }

    /**
     * List enabled chain/token payment methods.
     *
     * Each entry contains: chain, network, token, display_name, decimals,
     * kind ("native", "erc20", "trc20", "spl", "jetton") and an optional
     * min_amount.
     *
     * @return list<array<string, mixed>>
     * @throws PlaidlyException
     */
    public function list(): array
    {
        /** @var list<array<string, mixed>> */
        return $this->http->get('/v1/payment_methods');
    }
}
