<?php

declare(strict_types=1);

namespace Plaidly\Exception;

use RuntimeException;

/**
 * Thrown when the Plaidly API returns a non-2xx response.
 */
class PlaidlyException extends RuntimeException
{
    public function __construct(
        string $message,
        private readonly int $statusCode,
        private readonly string $code = 'UNKNOWN_ERROR',
    ) {
        parent::__construct($message);
    }

    /** HTTP status code returned by the API. */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /** Machine-readable error code from the API response. */
    public function getCode(): string
    {
        return $this->code;
    }
}
