<?php

declare(strict_types=1);

namespace Plaidly\Exception;

/**
 * Raised when the Plaidly API returns a non-2xx response.
 *
 * Use the more specific subclasses (AuthenticationException,
 * InvalidRequestException, NotFoundException, RateLimitException,
 * ApiServerException) to branch on error categories.
 */
class ApiException extends PlaidlyException
{
    /**
     * Build the most specific exception type for the given HTTP status.
     *
     * @param array<string, mixed> $body Decoded API response body.
     */
    public static function fromResponse(int $statusCode, array $body): self
    {
        $message = isset($body['message']) && is_string($body['message'])
            ? $body['message']
            : 'HTTP ' . $statusCode;

        $errorCode = isset($body['code']) && is_numeric($body['code'])
            ? (int) $body['code']
            : null;

        return match (true) {
            $statusCode === 401, $statusCode === 403 =>
                new AuthenticationException($message, $statusCode, $errorCode, $body),
            $statusCode === 404 =>
                new NotFoundException($message, $statusCode, $errorCode, $body),
            $statusCode === 409 =>
                new ConflictException($message, $statusCode, $errorCode, $body),
            $statusCode === 429 =>
                new RateLimitException($message, $statusCode, $errorCode, $body),
            $statusCode >= 400 && $statusCode < 500 =>
                new InvalidRequestException($message, $statusCode, $errorCode, $body),
            $statusCode >= 500 =>
                new ApiServerException($message, $statusCode, $errorCode, $body),
            default =>
                new self($message, $statusCode, $errorCode, $body),
        };
    }
}
