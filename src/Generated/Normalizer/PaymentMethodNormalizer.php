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
class PaymentMethodNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\PaymentMethod::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\PaymentMethod::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\PaymentMethod();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('methodID', $data) && $data['methodID'] !== null) {
            $object->setMethodID($data['methodID']);
        }
        elseif (\array_key_exists('methodID', $data) && $data['methodID'] === null) {
            $object->setMethodID(null);
        }
        if (\array_key_exists('chain', $data) && $data['chain'] !== null) {
            $object->setChain($data['chain']);
        }
        elseif (\array_key_exists('chain', $data) && $data['chain'] === null) {
            $object->setChain(null);
        }
        if (\array_key_exists('token', $data) && $data['token'] !== null) {
            $object->setToken($data['token']);
        }
        elseif (\array_key_exists('token', $data) && $data['token'] === null) {
            $object->setToken(null);
        }
        if (\array_key_exists('network', $data) && $data['network'] !== null) {
            $object->setNetwork($data['network']);
        }
        elseif (\array_key_exists('network', $data) && $data['network'] === null) {
            $object->setNetwork(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['methodID'] = $data->getMethodID();
        $dataArray['chain'] = $data->getChain();
        $dataArray['token'] = $data->getToken();
        $dataArray['network'] = $data->getNetwork();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\PaymentMethod::class => false];
    }
}