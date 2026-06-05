<?php

declare(strict_types=1);

namespace Plaidly;

/**
 * Official Plaidly PHP SDK client.
 *
 * ```php
 * $client = new \Plaidly\PlaidlyClient('your_api_key');
 *
 * $session = $client->paymentSessions->create(
 *     amount: 100.0,
 *     expiresIn: '15m',
 *     chain: 'ethereum',
 *     token: 'USDC',
 *     network: 'mainnet',
 * );
 *
 * echo $session['address'];     // deposit address
 * echo $session['payment_url']; // hosted checkout URL
 * ```
 */
final class PlaidlyClient
{
    public const VERSION = '1.0.0';

    public readonly PaymentSessions $paymentSessions;
    public readonly Merchants $merchants;
    public readonly Payouts $payouts;
    public readonly PaymentMethods $paymentMethods;
    public readonly Rates $rates;
    public readonly Sandbox $sandbox;

    private readonly HttpClientInterface $http;

    /**
     * @param string                   $apiKey         Merchant API key (sent as X-API-Key).
     * @param string                   $baseUrl        Override the API base URL.
     * @param int                      $timeoutSeconds Per-request timeout in seconds.
     * @param HttpClientInterface|null $http           Inject a transport (mainly for testing).
     */
    public function __construct(
        string $apiKey = '',
        string $baseUrl = 'https://api.plaidly.io',
        int $timeoutSeconds = 30,
        ?HttpClientInterface $http = null,
    ) {
        if ($http === null && $apiKey === '') {
            throw new \InvalidArgumentException('apiKey must not be empty');
        }

        $this->http = $http ?? new HttpClient($apiKey, $baseUrl, $timeoutSeconds);

        $this->paymentSessions = new PaymentSessions($this->http);
        $this->merchants       = new Merchants($this->http);
        $this->payouts         = new Payouts($this->http);
        $this->paymentMethods  = new PaymentMethods($this->http);
        $this->rates           = new Rates($this->http);
        $this->sandbox         = new Sandbox($this->http);
    }
}
