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
class UserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\User::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\User::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\User();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('personal_wallet_address', $data) && $data['personal_wallet_address'] !== null) {
            $object->setPersonalWalletAddress($data['personal_wallet_address']);
        }
        elseif (\array_key_exists('personal_wallet_address', $data) && $data['personal_wallet_address'] === null) {
            $object->setPersonalWalletAddress(null);
        }
        if (\array_key_exists('created_wallet_address', $data) && $data['created_wallet_address'] !== null) {
            $object->setCreatedWalletAddress($data['created_wallet_address']);
        }
        elseif (\array_key_exists('created_wallet_address', $data) && $data['created_wallet_address'] === null) {
            $object->setCreatedWalletAddress(null);
        }
        if (\array_key_exists('last_login_at', $data) && $data['last_login_at'] !== null) {
            $object->setLastLoginAt($data['last_login_at']);
        }
        elseif (\array_key_exists('last_login_at', $data) && $data['last_login_at'] === null) {
            $object->setLastLoginAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['personal_wallet_address'] = $data->getPersonalWalletAddress();
        $dataArray['created_wallet_address'] = $data->getCreatedWalletAddress();
        $dataArray['last_login_at'] = $data->getLastLoginAt();
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\User::class => false];
    }
}