<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Transport abstraction used by the resource classes. Allows tests to inject
 * a mock in place of the real cURL-backed {@see HttpClient}.
 */
interface HttpClientInterface
{
    /**
     * Execute a GET request.
     *
     * @param array<string, scalar> $query Optional query-string parameters.
     * @return array<string, mixed>|list<mixed>
     * @throws PlaidlyException
     */
    public function get(string $path, array $query = []): array;

    /**
     * Execute a POST request.
     *
     * @param array<string, mixed> $body
     * @return array<string, mixed>|list<mixed>
     * @throws PlaidlyException
     */
    public function post(string $path, array $body = []): array;
}
