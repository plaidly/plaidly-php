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
class CreatePaymentSessionRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\CreatePaymentSessionRequest::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\CreatePaymentSessionRequest::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\CreatePaymentSessionRequest();
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
        if (\array_key_exists('amount', $data) && $data['amount'] !== null) {
            $object->setAmount($data['amount']);
        }
        elseif (\array_key_exists('amount', $data) && $data['amount'] === null) {
            $object->setAmount(null);
        }
        if (\array_key_exists('expires_in', $data) && $data['expires_in'] !== null) {
            $object->setExpiresIn($data['expires_in']);
        }
        elseif (\array_key_exists('expires_in', $data) && $data['expires_in'] === null) {
            $object->setExpiresIn(null);
        }
        if (\array_key_exists('paymentMethod', $data) && $data['paymentMethod'] !== null) {
            $object->setPaymentMethod($this->denormalizer->denormalize($data['paymentMethod'], \Plaidly\Generated\Model\PaymentMethod::class, 'json', $context));
        }
        elseif (\array_key_exists('paymentMethod', $data) && $data['paymentMethod'] === null) {
            $object->setPaymentMethod(null);
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
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['amount'] = $data->getAmount();
        $dataArray['expires_in'] = $data->getExpiresIn();
        $dataArray['paymentMethod'] = $this->normalizer->normalize($data->getPaymentMethod(), 'json', $context);
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $values = [];
            foreach ($data->getMetadata() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['metadata'] = $values;
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\CreatePaymentSessionRequest::class => false];
    }
}