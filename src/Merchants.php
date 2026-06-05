<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Operations on merchant accounts.
 */
final class Merchants
{
    public function __construct(private readonly HttpClientInterface $http)
    {
    }

    /**
     * Register a new merchant and receive an API key.
     *
     * The response includes `api_key` and `webhook_secret`, which are only
     * returned at creation time. Store them securely.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function register(string $name, ?string $webhookUrl = null): array
    {
        $body = ['name' => $name];
        if ($webhookUrl !== null) {
            $body['webhook_url'] = $webhookUrl;
        }

        return $this->http->post('/v1/merchants', $body);
    }

    /**
     * Get the authenticated merchant's info.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function me(): array
    {
        return $this->http->get('/v1/me');
    }
}
