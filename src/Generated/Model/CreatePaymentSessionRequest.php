<?php

namespace Plaidly\Generated\Model;

class CreatePaymentSessionRequest
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Expected amount to be paid
     *
     * @var float|null
     */
    protected $amount;
    /**
     * Duration until session expires (e.g. 15m, 1h)
     *
     * @var string|null
     */
    protected $expiresIn;
    /**
     * @var PaymentMethod|null
     */
    protected $paymentMethod;
    /**
     * Optional key-value metadata (max 4KB)
     *
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * Expected amount to be paid
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }
    /**
     * Expected amount to be paid
     *
     * @param float|null $amount
     *
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->initialized['amount'] = true;
        $this->amount = $amount;
        return $this;
    }
    /**
     * Duration until session expires (e.g. 15m, 1h)
     *
     * @return string|null
     */
    public function getExpiresIn(): ?string
    {
        return $this->expiresIn;
    }
    /**
     * Duration until session expires (e.g. 15m, 1h)
     *
     * @param string|null $expiresIn
     *
     * @return self
     */
    public function setExpiresIn(?string $expiresIn): self
    {
        $this->initialized['expiresIn'] = true;
        $this->expiresIn = $expiresIn;
        return $this;
    }
    /**
     * @return PaymentMethod|null
     */
    public function getPaymentMethod(): ?PaymentMethod
    {
        return $this->paymentMethod;
    }
    /**
     * @param PaymentMethod|null $paymentMethod
     *
     * @return self
     */
    public function setPaymentMethod(?PaymentMethod $paymentMethod): self
    {
        $this->initialized['paymentMethod'] = true;
        $this->paymentMethod = $paymentMethod;
        return $this;
    }
    /**
     * Optional key-value metadata (max 4KB)
     *
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
     * Optional key-value metadata (max 4KB)
     *
     * @param array<string, mixed>|null $metadata
     *
     * @return self
     */
    public function setMetadata(?iterable $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;
        return $this;
    }
}