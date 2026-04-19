<?php

declare(strict_types=1);

use Plaidly\Webhook;

/**
 * Minimal test runner — no PHPUnit dependency required.
 * Run with: php tests/WebhookTest.php
 */
function sign(string $payload, string $secret): string
{
    return 'sha256=' . hash_hmac('sha256', $payload, $secret);
}

function assert_true(bool $value, string $name): void
{
    if (!$value) {
        echo "FAIL: {$name}\n";
        exit(1);
    }
    echo "PASS: {$name}\n";
}

require_once __DIR__ . '/../src/Webhook.php';

$payload = '{"event":"payment.completed"}';
$secret  = 'whsec_test';

assert_true(
    Webhook::verifySignature($payload, sign($payload, $secret), $secret),
    'valid signature returns true'
);

assert_true(
    !Webhook::verifySignature('{"event":"tampered"}', sign($payload, $secret), $secret),
    'tampered payload returns false'
);

assert_true(
    !Webhook::verifySignature($payload, sign($payload, 'correct_secret'), 'wrong_secret'),
    'wrong secret returns false'
);

assert_true(
    !Webhook::verifySignature($payload, 'notasha256sig', $secret),
    'missing sha256= prefix returns false'
);

assert_true(
    !Webhook::verifySignature($payload, 'sha256=aabbcc', $secret),
    'incorrect hash returns false'
);

echo "\nAll tests passed.\n";
