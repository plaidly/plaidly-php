<?php

namespace Plaidly\Generated\Endpoint;

class FulfillDemoPaymentSession extends \Plaidly\Generated\Runtime\Client\BaseEndpoint implements \Plaidly\Generated\Runtime\Client\Endpoint
{
    protected $session_id;
    /**
     * @param string $sessionId Demo session ID
     */
    public function __construct(string $sessionId)
    {
        $this->session_id = $sessionId;
    }
    use \Plaidly\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return str_replace(['{session_id}'], [$this->session_id], '/v1/payment_sessions/{session_id}/fulfill');
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
     * @throws \Plaidly\Generated\Exception\FulfillDemoPaymentSessionNotFoundException
     *
     * @return null|\Plaidly\Generated\Model\Error
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            throw new \Plaidly\Generated\Exception\FulfillDemoPaymentSessionNotFoundException($serializer->deserialize($body, 'Plaidly\Generated\Model\Error', 'json'), $response);
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