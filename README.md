# plaidly-php

Official PHP SDK for the [Plaidly](https://plaidly.io) cryptocurrency payment API.

Types and the low-level HTTP endpoints are auto-generated from the Plaidly
OpenAPI 3.1 spec with [`jane-php/open-api-3-1`](https://github.com/janephp/janephp).
The `PlaidlyClient` class in this package is a hand-written wrapper that
plugs the generated client into a cURL-backed PSR-18 transport, injects
the `X-API-Key` header, retries on transient 5xx / network failures, and
surfaces typed `PlaidlyException` values.

## Installation

```bash
composer require plaidly/plaidly-php
```

## Requirements

- PHP 8.1+
- ext-curl
- ext-json
- ext-hash

## Usage

```php
<?php

require 'vendor/autoload.php';

use Plaidly\PlaidlyClient;
use Plaidly\Generated\Model\CreatePaymentSessionRequest;
use Plaidly\Generated\Model\PaymentMethod;

$client = new PlaidlyClient($_ENV['PLAIDLY_API_KEY']);

$session = $client->createPaymentSession(new CreatePaymentSessionRequest([
    'amount'        => 10.00,
    'expiresIn'     => '15m',
    'paymentMethod' => new PaymentMethod([
        'methodID' => 0,
        'chain'    => 'solana',
        'token'    => 'USDC',
        'network'  => 'mainnet',
    ]),
]));

echo $session->getAddress(); // Send funds here
```

## Webhook Verification

```php
<?php

use Plaidly\Webhook;

$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_PLAIDLY_SIGNATURE'] ?? '';

if (!Webhook::verifySignature($payload, $signature, $_ENV['PLAIDLY_WEBHOOK_SECRET'])) {
    http_response_code(401);
    exit('Invalid signature');
}

// handle event
http_response_code(204);
```

## Escape hatch — generated client

```php
$merchant = $client->raw()->getMe();
```

## Regenerating from the spec

The committed copy of the Plaidly spec lives at `spec/openapi.yaml`.

```bash
composer install
composer generate              # runs vendor/bin/jane-openapi generate
```

Generated output: `src/Generated/`. Do not edit by hand.

Pinned versions:

- `jane-php/open-api-3-1 ^7.6`
- `jane-php/open-api-runtime ^7.6`
- `php-http/curl-client ^2.4`

## API Reference

See [docs.plaidly.io](https://docs.plaidly.io) for full API documentation.
