# plaidly-php

Official PHP SDK for the [Plaidly](https://plaidly.io) cryptocurrency payment API.

## Installation

```bash
composer require plaidly/plaidly-php
```

## Requirements

- PHP 8.1+
- ext-curl, ext-json, ext-hash

## Quick start

```php
<?php

require 'vendor/autoload.php';

$client = new \Plaidly\PlaidlyClient($_ENV['PLAIDLY_API_KEY']);

// Create a payment session
$session = $client->paymentSessions->create(
    amount: 100.0,
    expiresIn: '15m',
    chain: 'ethereum',
    token: 'USDC',
    network: 'mainnet',
    metadata: ['order_id' => 'A-1'],
);

echo $session['address'];     // deposit address
echo $session['payment_url']; // hosted checkout URL
echo $session['qr_data'];     // payment URI for QR encoding
```

Poll a session (public, no auth required for checkout):

```php
$session = $client->paymentSessions->get($session['session_id']);
// status: pending -> partial_paid -> paid -> finalizing -> confirmed -> completed
```

`completed` and `confirmed` both mean the payment succeeded; `expired` and
`failed` are terminal failures.

## Demo / sandbox

```php
$demo = $client->paymentSessions->createDemo(chain: 'ethereum', token: 'USDC');
$client->paymentSessions->simulate($demo['session_id']); // instantly completes
```

## Public lookups

```php
$methods = $client->paymentMethods->list();        // enabled chain/token pairs
$rates   = $client->rates->get(['ETH', 'SOL']);    // USD spot rates
$faucets = $client->sandbox->faucets();            // testnet faucet URLs
```

## Merchants & payouts

```php
$merchant = $client->merchants->register('Acme', 'https://acme.test/webhook');
// $merchant['api_key'] and $merchant['webhook_secret'] are returned once — store them.

$me = $client->merchants->me();

$payout = $client->payouts->create(
    destinationAddress: '0xabc...',
    amount: 25.0,
    tokenSymbol: 'ETH',
    network: 'ethereum',
);
```

## Webhook verification

Plaidly signs each delivery with your `webhook_secret`. The
`X-Plaidly-Signature` header has the form `t=<unix>,v1=<hex>`, where the hex is
`HMAC-SHA256(secret, "<t>.<rawBody>")`. Verification is constant-time and
enforces a 5-minute timestamp tolerance by default.

```php
<?php

use Plaidly\Webhook;

$payload   = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_PLAIDLY_SIGNATURE'] ?? '';

if (!Webhook::verifySignature($payload, $signature, $_ENV['PLAIDLY_WEBHOOK_SECRET'])) {
    http_response_code(400);
    exit('invalid signature');
}

$event = json_decode($payload, true);
// $event['event_type']: payment_session.completed | expired | partial_paid

http_response_code(204);
```

## Error handling

Non-2xx responses throw typed exceptions, all extending
`Plaidly\Exception\PlaidlyException`:

| Exception | When |
|-----------|------|
| `AuthenticationException` | 401 / 403 |
| `InvalidRequestException` | other 4xx |
| `NotFoundException` | 404 |
| `ConflictException` | 409 |
| `RateLimitException` | 429 |
| `ApiServerException` | 5xx (retried automatically) |
| `TransportException` | network/cURL failure (retried automatically) |

```php
use Plaidly\Exception\ApiException;

try {
    $client->paymentSessions->get('missing');
} catch (ApiException $e) {
    $e->getStatusCode(); // int|null
    $e->getErrorCode();  // int|null
    $e->getBody();        // decoded response body
}
```

## Development

```bash
composer install
composer test   # phpunit
```

## API reference

See [docs.plaidly.io](https://docs.plaidly.io) for full API documentation.
