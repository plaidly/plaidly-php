<?php

declare(strict_types=1);

namespace Plaidly\Exception;

/** Raised on 4xx responses that indicate a malformed or rejected request. */
final class InvalidRequestException extends ApiException
{
}
