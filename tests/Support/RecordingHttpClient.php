<?php

declare(strict_types=1);

namespace Plaidly\Tests\Support;

use Plaidly\HttpClientInterface;

/**
 * Test double that records requests and returns queued responses.
 */
final class RecordingHttpClient implements HttpClientInterface
{
    /** @var list<array{method: string, path: string, query: array<string, scalar>, body: array<string, mixed>}> */
    public array $calls = [];

    /** @var array<string, mixed>|list<mixed> */
    private array $nextResponse = [];

    /**
     * @param array<string, mixed>|list<mixed> $response
     */
    public function willReturn(array $response): self
    {
        $this->nextResponse = $response;

        return $this;
    }

    public function get(string $path, array $query = []): array
    {
        $this->calls[] = ['method' => 'GET', 'path' => $path, 'query' => $query, 'body' => []];

        return $this->nextResponse;
    }

    public function post(string $path, array $body = []): array
    {
        $this->calls[] = ['method' => 'POST', 'path' => $path, 'query' => [], 'body' => $body];

        return $this->nextResponse;
    }

    /** @return array{method: string, path: string, query: array<string, scalar>, body: array<string, mixed>} */
    public function lastCall(): array
    {
        return $this->calls[array_key_last($this->calls)];
    }
}
