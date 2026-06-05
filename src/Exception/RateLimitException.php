<?php

declare(strict_types=1);

namespace Plaidly\Exception;

/** Raised on 429 responses (rate limit exceeded). */
final class RateLimitException extends ApiException
{
}
