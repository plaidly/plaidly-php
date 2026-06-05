<?php

declare(strict_types=1);

namespace Plaidly;

/**
 * Webhook signature verification helper.
 *
 * Plaidly signs each delivery with the merchant's `webhook_secret` and sets the
 * `X-Plaidly-Signature` header to:
 *
 *     t=<unix>,v1=<hex hmac-sha256(secret, "<t>.<rawBody>")>
 *
 * Verification recomputes the HMAC over "<t>.<rawBody>", compares it to the
 * provided v1 value in constant time, and enforces a timestamp tolerance to
 * mitigate replay attacks.
 *
 * ```php
 * $payload   = file_get_contents('php://input');
 * $signature = $_SERVER['HTTP_X_PLAIDLY_SIGNATURE'] ?? '';
 *
 * if (!\Plaidly\Webhook::verifySignature($payload, $signature, $_ENV['PLAIDLY_WEBHOOK_SECRET'])) {
 *     http_response_code(400);
 *     exit;
 * }
 * ```
 */
final class Webhook
{
    /** Default tolerance for the signature timestamp, in seconds. */
    public const DEFAULT_TOLERANCE = 300;

    /**
     * Verify an incoming webhook signature.
     *
     * @param string $payload     Raw, unmodified request body.
     * @param string $signature   Value of the X-Plaidly-Signature header.
     * @param string $secret      Merchant webhook secret.
     * @param int    $tolerance   Max allowed age of the signature, in seconds.
     *                            Pass 0 to disable the timestamp check.
     * @param int|null $now       Current unix time (override for testing).
     */
    public static function verifySignature(
        string $payload,
        string $signature,
        string $secret,
        int $tolerance = self::DEFAULT_TOLERANCE,
        ?int $now = null,
    ): bool {
        $parsed = self::parse($signature);
        if ($parsed === null) {
            return false;
        }

        [$timestamp, $provided] = $parsed;

        if ($tolerance > 0) {
            $now ??= time();
            if (abs($now - $timestamp) > $tolerance) {
                return false;
            }
        }

        $expected = hash_hmac('sha256', $timestamp . '.' . $payload, $secret);

        return hash_equals($expected, $provided);
    }

    /**
     * Parse a "t=<unix>,v1=<hex>" signature header.
     *
     * @return array{0: int, 1: string}|null [timestamp, v1Hex] or null if malformed.
     */
    private static function parse(string $signature): ?array
    {
        $timestamp = null;
        $v1 = null;

        foreach (explode(',', $signature) as $part) {
            $pair = explode('=', trim($part), 2);
            if (count($pair) !== 2) {
                continue;
            }
            [$key, $value] = $pair;
            if ($key === 't' && ctype_digit($value)) {
                $timestamp = (int) $value;
            } elseif ($key === 'v1' && $value !== '') {
                $v1 = $value;
            }
        }

        if ($timestamp === null || $v1 === null) {
            return null;
        }

        return [$timestamp, $v1];
    }
}
