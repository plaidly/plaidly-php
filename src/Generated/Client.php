<?php

namespace Plaidly\Generated;

class Client extends \Plaidly\Generated\Runtime\Client\Client
{
    /**
     * @param null|\Plaidly\Generated\Model\RegisterMerchantRequest $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Merchant|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function registerMerchant(?\Plaidly\Generated\Model\RegisterMerchantRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\RegisterMerchant($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Merchant|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function getMe(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\GetMe(), $fetch);
    }
    /**
     * @param null|\Plaidly\Generated\Model\V1MeLoginPostBody $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\User|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function userLogin(?\Plaidly\Generated\Model\V1MeLoginPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\UserLogin($requestBody), $fetch);
    }
    /**
     * @param array{
     *    "Authorization": string, //Bearer JWT token
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\User|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function userRegister(array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\UserRegister($headerParameters), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Wallet[]|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function listWallets(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\ListWallets(), $fetch);
    }
    /**
     * @param null|\Plaidly\Generated\Model\CreateWalletRequest $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Wallet|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function createWallet(?\Plaidly\Generated\Model\CreateWalletRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\CreateWallet($requestBody), $fetch);
    }
    /**
     * @param string $walletId Wallet ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Wallet|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function getWallet(string $walletId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\GetWallet($walletId), $fetch);
    }
    /**
     * @param string $walletId Wallet ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Transaction[]|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function listTransactions(string $walletId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\ListTransactions($walletId), $fetch);
    }
    /**
     * @param null|\Plaidly\Generated\Model\RequestPayoutRequest $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Payout|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function requestPayout(?\Plaidly\Generated\Model\RequestPayoutRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\RequestPayout($requestBody), $fetch);
    }
    /**
     * @param string $payoutId Payout ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Payout|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function getPayout(string $payoutId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\GetPayout($payoutId), $fetch);
    }
    /**
     * @param null|\Plaidly\Generated\Model\CreatePaymentSessionRequest $requestBody
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\PaymentSession|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function createPaymentSession(?\Plaidly\Generated\Model\CreatePaymentSessionRequest $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\CreatePaymentSession($requestBody), $fetch);
    }
    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\PaymentSession|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function createDemoPaymentSession(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\CreateDemoPaymentSession(), $fetch);
    }
    /**
     * @param string $sessionId Demo session ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Plaidly\Generated\Exception\FulfillDemoPaymentSessionNotFoundException
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function fulfillDemoPaymentSession(string $sessionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\FulfillDemoPaymentSession($sessionId), $fetch);
    }
    /**
     * @param string $sessionId Demo session ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \Plaidly\Generated\Exception\ProvideDevWalletForDemoNotFoundException
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function provideDevWalletForDemo(string $sessionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\ProvideDevWalletForDemo($sessionId), $fetch);
    }
    /**
     * @param string $sessionId Payment session ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\PaymentSession|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function getPaymentSession(string $sessionId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\GetPaymentSession($sessionId), $fetch);
    }
    /**
     * @param string $sessionId
     * @param array $accept Accept content header application/pdf|application/json
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null|\Plaidly\Generated\Model\Error : \Psr\Http\Message\ResponseInterface)
     */
    public function getReceiptBySessionID(string $sessionId, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new \Plaidly\Generated\Endpoint\GetReceiptBySessionID($sessionId, $accept), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Plaidly\Generated\Normalizer\JaneObjectNormalizer()];
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}