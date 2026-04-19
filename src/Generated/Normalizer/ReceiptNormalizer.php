<?php

namespace Plaidly\Generated\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Plaidly\Generated\Runtime\Normalizer\CheckArray;
use Plaidly\Generated\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ReceiptNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\Receipt::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\Receipt::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\Receipt();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('amount', $data) && \is_int($data['amount'])) {
            $data['amount'] = (double) $data['amount'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('session_id', $data) && $data['session_id'] !== null) {
            $object->setSessionId($data['session_id']);
        }
        elseif (\array_key_exists('session_id', $data) && $data['session_id'] === null) {
            $object->setSessionId(null);
        }
        if (\array_key_exists('merchant_id', $data) && $data['merchant_id'] !== null) {
            $object->setMerchantId($data['merchant_id']);
        }
        elseif (\array_key_exists('merchant_id', $data) && $data['merchant_id'] === null) {
            $object->setMerchantId(null);
        }
        if (\array_key_exists('issued_at', $data) && $data['issued_at'] !== null) {
            $object->setIssuedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['issued_at']));
        }
        elseif (\array_key_exists('issued_at', $data) && $data['issued_at'] === null) {
            $object->setIssuedAt(null);
        }
        if (\array_key_exists('amount', $data) && $data['amount'] !== null) {
            $object->setAmount($data['amount']);
        }
        elseif (\array_key_exists('amount', $data) && $data['amount'] === null) {
            $object->setAmount(null);
        }
        if (\array_key_exists('currency', $data) && $data['currency'] !== null) {
            $object->setCurrency($data['currency']);
        }
        elseif (\array_key_exists('currency', $data) && $data['currency'] === null) {
            $object->setCurrency(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['session_id'] = $data->getSessionId();
        $dataArray['merchant_id'] = $data->getMerchantId();
        $dataArray['issued_at'] = $data->getIssuedAt()?->format('Y-m-d\TH:i:sP');
        $dataArray['amount'] = $data->getAmount();
        $dataArray['currency'] = $data->getCurrency();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\Receipt::class => false];
    }
}