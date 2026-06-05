<?php

declare(strict_types=1);

namespace Plaidly\Exception;

use RuntimeException;
use Throwable;

/**
 * Base exception for all errors raised by the Plaidly SDK.
 */
class PlaidlyException extends RuntimeException
{
    /**
     * @param int|null             $statusCode HTTP status code, or null for transport-level failures.
     * @param int|null             $errorCode  Machine-readable error code from the API body.
     * @param array<string, mixed> $body       Decoded API response body, when available.
     */
    public function __construct(
        string $message,
        private readonly ?int $statusCode = null,
        private readonly ?int $errorCode = null,
        private readonly array $body = [],
        ?Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }

    /** HTTP status code returned by the API, or null for transport failures. */
    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    /** Machine-readable error code from the API response body, when present. */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * Full decoded API response body, when available.
     *
     * @return array<string, mixed>
     */
    public function getBody(): array
    {
        return $this->body;
    }
}
