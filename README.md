# plaidly-php

Official PHP SDK for the [Plaidly](https://plaidly.io) cryptocurrency payment API.

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

$client = new \Plaidly\PlaidlyClient($_ENV['PLAIDLY_API_KEY']);

// Create a payment session
$session = $client->sessions->create(
    amount: '10.00',
    currency: 'USDC',
    chain: 'solana',
    callbackUrl: 'https://yoursite.com/webhook',
);

echo $session['wallet_address']; // Send funds here
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

## API Reference

See [docs.plaidly.io](https://docs.plaidly.io) for full API documentation.
