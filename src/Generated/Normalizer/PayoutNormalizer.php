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
class PayoutNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\Payout::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\Payout::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\Payout();
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
        if (\array_key_exists('merchant_id', $data) && $data['merchant_id'] !== null) {
            $object->setMerchantId($data['merchant_id']);
        }
        elseif (\array_key_exists('merchant_id', $data) && $data['merchant_id'] === null) {
            $object->setMerchantId(null);
        }
        if (\array_key_exists('destination_address', $data) && $data['destination_address'] !== null) {
            $object->setDestinationAddress($data['destination_address']);
        }
        elseif (\array_key_exists('destination_address', $data) && $data['destination_address'] === null) {
            $object->setDestinationAddress(null);
        }
        if (\array_key_exists('amount', $data) && $data['amount'] !== null) {
            $object->setAmount($data['amount']);
        }
        elseif (\array_key_exists('amount', $data) && $data['amount'] === null) {
            $object->setAmount(null);
        }
        if (\array_key_exists('token_symbol', $data) && $data['token_symbol'] !== null) {
            $object->setTokenSymbol($data['token_symbol']);
        }
        elseif (\array_key_exists('token_symbol', $data) && $data['token_symbol'] === null) {
            $object->setTokenSymbol(null);
        }
        if (\array_key_exists('network', $data) && $data['network'] !== null) {
            $object->setNetwork($data['network']);
        }
        elseif (\array_key_exists('network', $data) && $data['network'] === null) {
            $object->setNetwork(null);
        }
        if (\array_key_exists('tx_hash', $data) && $data['tx_hash'] !== null) {
            $object->setTxHash($data['tx_hash']);
        }
        elseif (\array_key_exists('tx_hash', $data) && $data['tx_hash'] === null) {
            $object->setTxHash(null);
        }
        if (\array_key_exists('status', $data) && $data['status'] !== null) {
            $object->setStatus($data['status']);
        }
        elseif (\array_key_exists('status', $data) && $data['status'] === null) {
            $object->setStatus(null);
        }
        if (\array_key_exists('requested_at', $data) && $data['requested_at'] !== null) {
            $object->setRequestedAt($data['requested_at']);
        }
        elseif (\array_key_exists('requested_at', $data) && $data['requested_at'] === null) {
            $object->setRequestedAt(null);
        }
        if (\array_key_exists('sent_at', $data) && $data['sent_at'] !== null) {
            $object->setSentAt($data['sent_at']);
        }
        elseif (\array_key_exists('sent_at', $data) && $data['sent_at'] === null) {
            $object->setSentAt(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['merchant_id'] = $data->getMerchantId();
        $dataArray['destination_address'] = $data->getDestinationAddress();
        $dataArray['amount'] = $data->getAmount();
        $dataArray['token_symbol'] = $data->getTokenSymbol();
        $dataArray['network'] = $data->getNetwork();
        if ($data->isInitialized('txHash') && null !== $data->getTxHash()) {
            $dataArray['tx_hash'] = $data->getTxHash();
        }
        $dataArray['status'] = $data->getStatus();
        $dataArray['requested_at'] = $data->getRequestedAt();
        if ($data->isInitialized('sentAt') && null !== $data->getSentAt()) {
            $dataArray['sent_at'] = $data->getSentAt();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\Payout::class => false];
    }
}