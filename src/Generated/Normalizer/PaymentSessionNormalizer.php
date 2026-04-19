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
class PaymentSessionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\PaymentSession::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\PaymentSession::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\PaymentSession();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('expected_amount', $data) && \is_int($data['expected_amount'])) {
            $data['expected_amount'] = (double) $data['expected_amount'];
        }
        if (\array_key_exists('received_amount', $data) && \is_int($data['received_amount'])) {
            $data['received_amount'] = (double) $data['received_amount'];
        }
        if (\array_key_exists('demo', $data) && \is_int($data['demo'])) {
            $data['demo'] = (bool) $data['demo'];
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
        if (\array_key_exists('expected_amount', $data) && $data['expected_amount'] !== null) {
            $object->setExpectedAmount($data['expected_amount']);
        }
        elseif (\array_key_exists('expected_amount', $data) && $data['expected_amount'] === null) {
            $object->setExpectedAmount(null);
        }
        if (\array_key_exists('received_amount', $data) && $data['received_amount'] !== null) {
            $object->setReceivedAmount($data['received_amount']);
        }
        elseif (\array_key_exists('received_amount', $data) && $data['received_amount'] === null) {
            $object->setReceivedAmount(null);
        }
        if (\array_key_exists('address', $data) && $data['address'] !== null) {
            $object->setAddress($data['address']);
        }
        elseif (\array_key_exists('address', $data) && $data['address'] === null) {
            $object->setAddress(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('metadata', $data) && $data['metadata'] !== null) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['metadata'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setMetadata($values);
        }
        elseif (\array_key_exists('metadata', $data) && $data['metadata'] === null) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('expires_at', $data) && $data['expires_at'] !== null) {
            $object->setExpiresAt($data['expires_at']);
        }
        elseif (\array_key_exists('expires_at', $data) && $data['expires_at'] === null) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('completed_at', $data) && $data['completed_at'] !== null) {
            $object->setCompletedAt($data['completed_at']);
        }
        elseif (\array_key_exists('completed_at', $data) && $data['completed_at'] === null) {
            $object->setCompletedAt(null);
        }
        if (\array_key_exists('created_at', $data) && $data['created_at'] !== null) {
            $object->setCreatedAt($data['created_at']);
        }
        elseif (\array_key_exists('created_at', $data) && $data['created_at'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updated_at', $data) && $data['updated_at'] !== null) {
            $object->setUpdatedAt($data['updated_at']);
        }
        elseif (\array_key_exists('updated_at', $data) && $data['updated_at'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('demo', $data) && $data['demo'] !== null) {
            $object->setDemo($data['demo']);
        }
        elseif (\array_key_exists('demo', $data) && $data['demo'] === null) {
            $object->setDemo(null);
        }
        if (\array_key_exists('paymentMethod', $data) && $data['paymentMethod'] !== null) {
            $object->setPaymentMethod($this->denormalizer->denormalize($data['paymentMethod'], \Plaidly\Generated\Model\PaymentMethod::class, 'json', $context));
        }
        elseif (\array_key_exists('paymentMethod', $data) && $data['paymentMethod'] === null) {
            $object->setPaymentMethod(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['session_id'] = $data->getSessionId();
        $dataArray['merchant_id'] = $data->getMerchantId();
        $dataArray['expected_amount'] = $data->getExpectedAmount();
        $dataArray['received_amount'] = $data->getReceivedAmount();
        $dataArray['address'] = $data->getAddress();
        $dataArray['status'] = $data->getStatus();
        $values = [];
        foreach ($data->getMetadata() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['metadata'] = $values;
        $dataArray['expires_at'] = $data->getExpiresAt();
        if ($data->isInitialized('completedAt') && null !== $data->getCompletedAt()) {
            $dataArray['completed_at'] = $data->getCompletedAt();
        }
        $dataArray['created_at'] = $data->getCreatedAt();
        $dataArray['updated_at'] = $data->getUpdatedAt();
        $dataArray['demo'] = $data->getDemo();
        $dataArray['paymentMethod'] = $this->normalizer->normalize($data->getPaymentMethod(), 'json', $context);
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\PaymentSession::class => false];
    }
}