<?php

declare(strict_types=1);

namespace Plaidly;

/**
 * Official Plaidly PHP SDK client.
 *
 * Usage:
 *
 * ```php
 * $client = new \Plaidly\PlaidlyClient('pk_live_...');
 * $session = $client->sessions->create('100.00', 'USDC', 'solana');
 * ```
 */
final class PlaidlyClient
{
    public readonly Sessions $sessions;
    public readonly Merchants $merchants;
    public readonly Payouts $payouts;
    public readonly Sandbox $sandbox;

    /**
     * @param string $apiKey        Your Plaidly API key.
     * @param string $baseUrl       Override the API base URL (useful for testing).
     * @param int    $timeoutSeconds HTTP request timeout in seconds.
     */
    public function __construct(
        string $apiKey,
        string $baseUrl = 'https://api.plaidly.io',
        int $timeoutSeconds = 30,
    ) {
        if ($apiKey === '') {
            throw new \InvalidArgumentException('apiKey must not be empty');
        }
        $http = new HttpClient($apiKey, $baseUrl, $timeoutSeconds);

        $this->sessions  = new Sessions($http);
        $this->merchants = new Merchants($http);
        $this->payouts   = new Payouts($http);
        $this->sandbox   = new Sandbox($http);
    }
}
