<?php

namespace Plaidly\Generated\Endpoint;

class CreateWallet extends \Plaidly\Generated\Runtime\Client\BaseEndpoint implements \Plaidly\Generated\Runtime\Client\Endpoint
{
    /**
     * @param null|\Plaidly\Generated\Model\CreateWalletRequest $requestBody
     */
    public function __construct(?\Plaidly\Generated\Model\CreateWalletRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }
    use \Plaidly\Generated\Runtime\Client\EndpointTrait;
    public function getMethod(): string
    {
        return 'POST';
    }
    public function getUri(): string
    {
        return '/v1/wallets';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Plaidly\Generated\Model\CreateWalletRequest) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
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
     * @return null|\Plaidly\Generated\Model\Wallet|\Plaidly\Generated\Model\Error
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (201 === $status && mb_strpos(strtolower($contentType), 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Plaidly\Generated\Model\Wallet', 'json');
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