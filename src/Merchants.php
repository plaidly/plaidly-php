<?php

declare(strict_types=1);

namespace Plaidly;

use Plaidly\Exception\PlaidlyException;

/**
 * Operations on merchant accounts.
 */
final class Merchants
{
    public function __construct(private readonly HttpClient $http) {}

    /**
     * Register a new merchant.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function register(
        string  $name,
        string  $email,
        ?string $webhookUrl = null,
        bool    $sandbox = false,
    ): array {
        $body = ['name' => $name, 'email' => $email, 'sandbox' => $sandbox];
        if ($webhookUrl !== null) {
            $body['webhook_url'] = $webhookUrl;
        }
        return $this->http->post('/v1/merchants', $body);
    }

    /**
     * Get the authenticated merchant's profile.
     *
     * @return array<string, mixed>
     * @throws PlaidlyException
     */
    public function me(): array
    {
        return $this->http->get('/v1/me');
    }
}
