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
class TransactionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Plaidly\Generated\Model\Transaction::class;
    }
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return is_object($data) && get_class($data) === \Plaidly\Generated\Model\Transaction::class;
    }
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Plaidly\Generated\Model\Transaction();
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
        if (\array_key_exists('confirmed', $data) && \is_int($data['confirmed'])) {
            $data['confirmed'] = (bool) $data['confirmed'];
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        }
        elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('tx_hash', $data) && $data['tx_hash'] !== null) {
            $object->setTxHash($data['tx_hash']);
        }
        elseif (\array_key_exists('tx_hash', $data) && $data['tx_hash'] === null) {
            $object->setTxHash(null);
        }
        if (\array_key_exists('session_id', $data) && $data['session_id'] !== null) {
            $object->setSessionId($data['session_id']);
        }
        elseif (\array_key_exists('session_id', $data) && $data['session_id'] === null) {
            $object->setSessionId(null);
        }
        if (\array_key_exists('network', $data) && $data['network'] !== null) {
            $object->setNetwork($data['network']);
        }
        elseif (\array_key_exists('network', $data) && $data['network'] === null) {
            $object->setNetwork(null);
        }
        if (\array_key_exists('token_symbol', $data) && $data['token_symbol'] !== null) {
            $object->setTokenSymbol($data['token_symbol']);
        }
        elseif (\array_key_exists('token_symbol', $data) && $data['token_symbol'] === null) {
            $object->setTokenSymbol(null);
        }
        if (\array_key_exists('from_address', $data) && $data['from_address'] !== null) {
            $object->setFromAddress($data['from_address']);
        }
        elseif (\array_key_exists('from_address', $data) && $data['from_address'] === null) {
            $object->setFromAddress(null);
        }
        if (\array_key_exists('to_address', $data) && $data['to_address'] !== null) {
            $object->setToAddress($data['to_address']);
        }
        elseif (\array_key_exists('to_address', $data) && $data['to_address'] === null) {
            $object->setToAddress(null);
        }
        if (\array_key_exists('amount', $data) && $data['amount'] !== null) {
            $object->setAmount($data['amount']);
        }
        elseif (\array_key_exists('amount', $data) && $data['amount'] === null) {
            $object->setAmount(null);
        }
        if (\array_key_exists('detected_at', $data) && $data['detected_at'] !== null) {
            $object->setDetectedAt($data['detected_at']);
        }
        elseif (\array_key_exists('detected_at', $data) && $data['detected_at'] === null) {
            $object->setDetectedAt(null);
        }
        if (\array_key_exists('confirmed', $data) && $data['confirmed'] !== null) {
            $object->setConfirmed($data['confirmed']);
        }
        elseif (\array_key_exists('confirmed', $data) && $data['confirmed'] === null) {
            $object->setConfirmed(null);
        }
        if (\array_key_exists('block_number', $data) && $data['block_number'] !== null) {
            $object->setBlockNumber($data['block_number']);
        }
        elseif (\array_key_exists('block_number', $data) && $data['block_number'] === null) {
            $object->setBlockNumber(null);
        }
        return $object;
    }
    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['tx_hash'] = $data->getTxHash();
        $dataArray['session_id'] = $data->getSessionId();
        $dataArray['network'] = $data->getNetwork();
        $dataArray['token_symbol'] = $data->getTokenSymbol();
        if ($data->isInitialized('fromAddress') && null !== $data->getFromAddress()) {
            $dataArray['from_address'] = $data->getFromAddress();
        }
        if ($data->isInitialized('toAddress') && null !== $data->getToAddress()) {
            $dataArray['to_address'] = $data->getToAddress();
        }
        $dataArray['amount'] = $data->getAmount();
        $dataArray['detected_at'] = $data->getDetectedAt();
        $dataArray['confirmed'] = $data->getConfirmed();
        if ($data->isInitialized('blockNumber') && null !== $data->getBlockNumber()) {
            $dataArray['block_number'] = $data->getBlockNumber();
        }
        return $dataArray;
    }
    public function getSupportedTypes(?string $format = null): array
    {
        return [\Plaidly\Generated\Model\Transaction::class => false];
    }
}