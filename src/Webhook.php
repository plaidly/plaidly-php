<?php

declare(strict_types=1);

namespace Plaidly;

/**
 * Webhook signature verification helper.
 */
final class Webhook
{
    /**
     * Verify that an incoming webhook request originated from Plaidly.
     *
     * Plaidly sets the X-Plaidly-Signature header to "sha256=<hex>" where
     * the hex string is HMAC-SHA256(secret, rawBody).
     *
     * Example:
     *
     * ```php
     * $payload   = file_get_contents('php://input');
     * $signature = $_SERVER['HTTP_X_PLAIDLY_SIGNATURE'] ?? '';
     * $secret    = 'whsec_...';
     *
     * if (!\Plaidly\Webhook::verifySignature($payload, $signature, $secret)) {
     *     http_response_code(403);
     *     exit;
     * }
     * ```
     *
     * @param string $payload   Raw (unmodified) request body.
     * @param string $signature Value of the X-Plaidly-Signature header.
     * @param string $secret    Your webhook secret from the Plaidly dashboard.
     */
    public static function verifySignature(string $payload, string $signature, string $secret): bool
    {
        if (!str_starts_with($signature, 'sha256=')) {
            return false;
        }

        $expected = 'sha256=' . hash_hmac('sha256', $payload, $secret);

        return hash_equals($expected, $signature);
    }
}
