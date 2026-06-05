<?php

declare(strict_types=1);

namespace Plaidly\Exception;

/** Raised when the request never reached the API (cURL/network failure). */
final class TransportException extends PlaidlyException
{
}
