<?php

declare(strict_types=1);

namespace Plaidly\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Plaidly\Exception\ApiException;
use Plaidly\Exception\ApiServerException;
use Plaidly\Exception\AuthenticationException;
use Plaidly\Exception\ConflictException;
use Plaidly\Exception\InvalidRequestException;
use Plaidly\Exception\NotFoundException;
use Plaidly\Exception\PlaidlyException;
use Plaidly\Exception\RateLimitException;

final class ExceptionTest extends TestCase
{
    /** @return iterable<string, array{int, class-string}> */
    public static function statusProvider(): iterable
    {
        yield '401 -> auth'        => [401, AuthenticationException::class];
        yield '403 -> auth'        => [403, AuthenticationException::class];
        yield '404 -> not found'   => [404, NotFoundException::class];
        yield '409 -> conflict'    => [409, ConflictException::class];
        yield '422 -> invalid'     => [422, InvalidRequestException::class];
        yield '429 -> rate limit'  => [429, RateLimitException::class];
        yield '500 -> server'      => [500, ApiServerException::class];
        yield '503 -> server'      => [503, ApiServerException::class];
    }

    #[Test]
    #[DataProvider('statusProvider')]
    public function mapsStatusToTypedException(int $status, string $expected): void
    {
        $e = ApiException::fromResponse($status, ['code' => 7, 'message' => 'boom']);

        self::assertInstanceOf($expected, $e);
        self::assertInstanceOf(PlaidlyException::class, $e);
        self::assertSame($status, $e->getStatusCode());
        self::assertSame(7, $e->getErrorCode());
        self::assertSame('boom', $e->getMessage());
    }

    #[Test]
    public function fallsBackToStatusMessageWhenBodyHasNone(): void
    {
        $e = ApiException::fromResponse(400, []);

        self::assertInstanceOf(InvalidRequestException::class, $e);
        self::assertSame('HTTP 400', $e->getMessage());
        self::assertNull($e->getErrorCode());
        self::assertSame([], $e->getBody());
    }

    #[Test]
    public function preservesFullBody(): void
    {
        $body = ['code' => 12, 'message' => 'nope', 'extra' => ['k' => 'v']];
        $e = ApiException::fromResponse(404, $body);

        self::assertSame($body, $e->getBody());
    }
}
