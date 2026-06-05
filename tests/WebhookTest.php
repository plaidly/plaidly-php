<?php

declare(strict_types=1);

namespace Plaidly\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Plaidly\Webhook;

final class WebhookTest extends TestCase
{
    private const SECRET = 'whsec_test_secret';
    private const TIMESTAMP = 1700000000;
    private const PAYLOAD = '{"event_type":"payment_session.completed","session_id":"ps_demo_123","status":"completed","amount":100,"currency":"USDC","chain":"ethereum","network":"mainnet","timestamp":1700000000}';
    private const V1 = '8c63fdd7292ed1724d0b1e4d02083025bcfc53507213f20a9e353b7efa6038bb';

    private function header(int $timestamp = self::TIMESTAMP, string $v1 = self::V1): string
    {
        return 't=' . $timestamp . ',v1=' . $v1;
    }

    #[Test]
    public function acceptsGoldenVector(): void
    {
        self::assertTrue(
            Webhook::verifySignature(
                self::PAYLOAD,
                $this->header(),
                self::SECRET,
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function acceptsGoldenVectorWithinTolerance(): void
    {
        self::assertTrue(
            Webhook::verifySignature(
                self::PAYLOAD,
                $this->header(),
                self::SECRET,
                tolerance: 300,
                now: self::TIMESTAMP + 120,
            ),
        );
    }

    #[Test]
    public function rejectsTamperedPayload(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD . ' ',
                $this->header(),
                self::SECRET,
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function rejectsWrongSecret(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                $this->header(),
                'whsec_wrong_secret',
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function rejectsTamperedTimestamp(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                $this->header(timestamp: self::TIMESTAMP + 1),
                self::SECRET,
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function rejectsStaleTimestamp(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                $this->header(),
                self::SECRET,
                tolerance: 300,
                now: self::TIMESTAMP + 301,
            ),
        );
    }

    #[Test]
    public function rejectsFutureTimestampBeyondTolerance(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                $this->header(),
                self::SECRET,
                tolerance: 300,
                now: self::TIMESTAMP - 301,
            ),
        );
    }

    #[Test]
    public function rejectsLegacyShaPrefixScheme(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                'sha256=' . self::V1,
                self::SECRET,
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function rejectsMissingV1(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                't=' . self::TIMESTAMP,
                self::SECRET,
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function rejectsMissingTimestamp(): void
    {
        self::assertFalse(
            Webhook::verifySignature(
                self::PAYLOAD,
                'v1=' . self::V1,
                self::SECRET,
                tolerance: 0,
            ),
        );
    }

    #[Test]
    public function rejectsEmptySignature(): void
    {
        self::assertFalse(
            Webhook::verifySignature(self::PAYLOAD, '', self::SECRET, tolerance: 0),
        );
    }

    #[Test]
    public function toleratesReorderedAndPaddedParts(): void
    {
        self::assertTrue(
            Webhook::verifySignature(
                self::PAYLOAD,
                'v1=' . self::V1 . ', t=' . self::TIMESTAMP,
                self::SECRET,
                tolerance: 0,
            ),
        );
    }
}
