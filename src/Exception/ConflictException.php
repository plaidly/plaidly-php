<?php

declare(strict_types=1);

namespace Plaidly\Exception;

/**
 * Raised on 409 responses, e.g. simulating a payment for a session that is
 * not pending or is not a demo/sandbox session.
 */
final class ConflictException extends ApiException
{
}
