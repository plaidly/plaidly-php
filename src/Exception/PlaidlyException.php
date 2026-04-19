<?php

declare(strict_types=1);

namespace Plaidly\Exception;

use RuntimeException;

/**
 * Thrown when the Plaidly API returns a non-2xx response.
 */
class PlaidlyException extends RuntimeException
{
    private readonly int $statusCode;
    private readonly string $errorCode;

    public function __construct(
        string $message,
        int $statusCode,
        string $errorCode = 'UNKNOWN_ERROR',
    ) {
        parent::__construct($message);
        $this->statusCode = $statusCode;
        $this->errorCode = $errorCode;
    }

    /** HTTP status code returned by the API. */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /** Machine-readable error code from the API response. */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }
}
