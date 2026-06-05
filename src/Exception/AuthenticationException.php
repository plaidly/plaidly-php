<?php

declare(strict_types=1);

namespace Plaidly\Exception;

/** Raised on 401/403 responses (missing or invalid API key). */
final class AuthenticationException extends ApiException
{
}
