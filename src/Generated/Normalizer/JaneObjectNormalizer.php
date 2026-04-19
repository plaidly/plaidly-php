<?php

namespace Plaidly\Generated\Normalizer;

use Plaidly\Generated\Runtime\Normalizer\CheckArray;
use Plaidly\Generated\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = [
        
        \Plaidly\Generated\Model\User::class => \Plaidly\Generated\Normalizer\UserNormalizer::class,
        
        \Plaidly\Generated\Model\Error::class => \Plaidly\Generated\Normalizer\ErrorNormalizer::class,
        
        \Plaidly\Generated\Model\CreateWalletRequest::class => \Plaidly\Generated\Normalizer\CreateWalletRequestNormalizer::class,
        
        \Plaidly\Generated\Model\Wallet::class => \Plaidly\Generated\Normalizer\WalletNormalizer::class,
        
        \Plaidly\Generated\Model\Transaction::class => \Plaidly\Generated\Normalizer\TransactionNormalizer::class,
        
        \Plaidly\Generated\Model\CreatePaymentSessionRequest::class => \Plaidly\Generated\Normalizer\CreatePaymentSessionRequestNormalizer::class,
        
        \Plaidly\Generated\Model\PaymentMethod::class => \Plaidly\Generated\Normalizer\PaymentMethodNormalizer::class,
        
        \Plaidly\Generated\Model\PaymentSession::class => \Plaidly\Generated\Normalizer\PaymentSessionNormalizer::class,
        
        \Plaidly\Generated\Model\Receipt::class => \Plaidly\Generated\Normalizer\ReceiptNormalizer::class,
        
        \Plaidly\Generated\Model\SweepResponse::class => \Plaidly\Generated\Normalizer\SweepResponseNormalizer::class,
        
        \Plaidly\Generated\Model\RequestPayoutRequest::class => \Plaidly\Generated\Normalizer\RequestPayoutRequestNormalizer::class,
        
        \Plaidly\Generated\Model\Payout::class => \Plaidly\Generated\Normalizer\PayoutNormalizer::class,
        
        \Plaidly\Generated\Model\RegisterMerchantRequest::class => \Plaidly\Generated\Normalizer\RegisterMerchantRequestNormalizer::class,
        
        \Plaidly\Generated\Model\Merchant::class => \Plaidly\Generated\Normalizer\MerchantNormalizer::class,
        
        \Plaidly\Generated\Model\SendRequest::class => \Plaidly\Generated\Normalizer\SendRequestNormalizer::class,
        
        \Plaidly\Generated\Model\SendResponse::class => \Plaidly\Generated\Normalizer\SendResponseNormalizer::class,
        
        \Plaidly\Generated\Model\V1MeLoginPostBody::class => \Plaidly\Generated\Normalizer\V1MeLoginPostBodyNormalizer::class,
        
        \Jane\Component\JsonSchemaRuntime\Reference::class => \Plaidly\Generated\Runtime\Normalizer\ReferenceNormalizer::class,
    ], $normalizersCache = [];
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[get_class($data)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($data, $format, $context);
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $type, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [
            
            \Plaidly\Generated\Model\User::class => false,
            \Plaidly\Generated\Model\Error::class => false,
            \Plaidly\Generated\Model\CreateWalletRequest::class => false,
            \Plaidly\Generated\Model\Wallet::class => false,
            \Plaidly\Generated\Model\Transaction::class => false,
            \Plaidly\Generated\Model\CreatePaymentSessionRequest::class => false,
            \Plaidly\Generated\Model\PaymentMethod::class => false,
            \Plaidly\Generated\Model\PaymentSession::class => false,
            \Plaidly\Generated\Model\Receipt::class => false,
            \Plaidly\Generated\Model\SweepResponse::class => false,
            \Plaidly\Generated\Model\RequestPayoutRequest::class => false,
            \Plaidly\Generated\Model\Payout::class => false,
            \Plaidly\Generated\Model\RegisterMerchantRequest::class => false,
            \Plaidly\Generated\Model\Merchant::class => false,
            \Plaidly\Generated\Model\SendRequest::class => false,
            \Plaidly\Generated\Model\SendResponse::class => false,
            \Plaidly\Generated\Model\V1MeLoginPostBody::class => false,
            \Jane\Component\JsonSchemaRuntime\Reference::class => false,
        ];
    }
}