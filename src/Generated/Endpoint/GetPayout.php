<?php

namespace Plaidly\Generated\Endpoint;

class GetPayout extends \Plaidly\Generated\Runtime\Client\BaseEndpoint implements \Plaidly\Generated\Runtime\Client\Endpoint
{
    protected $payout_id;
    /**
     * @param string $payoutId Payout ID
     */
    public function __construct(string $payoutId)
    {
        $this->payout_id = $payoutId;
    }
    use \Plaidly\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'GET';
    }
    public function getUri(): string
    {
        return str_replace(['{payout_id}'], [$this->payout_id], '/v1/payouts/{payout_id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }
    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     *
     * @return null|\Plaidly\Generated\Model\Payout|\Plaidly\Generated\Model\Error
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Plaidly\Generated\Model\Payout', 'json');
        }
        if (mb_strpos(strtolower($contentType), 'application/json') !== false) {
            return $serializer->deserialize($body, 'Plaidly\Generated\Model\Error', 'json');
        }
    }
    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}