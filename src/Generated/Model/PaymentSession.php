<?php

namespace Plaidly\Generated\Model;

class PaymentSession
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
     * @var string|null
     */
    protected $sessionId;
    /**
     * @var string|null
     */
    protected $merchantId;
    /**
     * @var float|null
     */
    protected $expectedAmount;
    /**
     * @var float|null
     */
    protected $receivedAmount;
    /**
     * @var string|null
     */
    protected $address;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var array<string, mixed>|null
     */
    protected $metadata;
    /**
     * @var string|null
     */
    protected $expiresAt;
    /**
     * @var string|null
     */
    protected $completedAt;
    /**
     * @var string|null
     */
    protected $createdAt;
    /**
     * @var string|null
     */
    protected $updatedAt;
    /**
     * @var bool|null
     */
    protected $demo;
    /**
     * @var PaymentMethod|null
     */
    protected $paymentMethod;
    /**
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }
    /**
     * @param string|null $sessionId
     *
     * @return self
     */
    public function setSessionId(?string $sessionId): self
    {
        $this->initialized['sessionId'] = true;
        $this->sessionId = $sessionId;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }
    /**
     * @param string|null $merchantId
     *
     * @return self
     */
    public function setMerchantId(?string $merchantId): self
    {
        $this->initialized['merchantId'] = true;
        $this->merchantId = $merchantId;
        return $this;
    }
    /**
     * @return float|null
     */
    public function getExpectedAmount(): ?float
    {
        return $this->expectedAmount;
    }
    /**
     * @param float|null $expectedAmount
     *
     * @return self
     */
    public function setExpectedAmount(?float $expectedAmount): self
    {
        $this->initialized['expectedAmount'] = true;
        $this->expectedAmount = $expectedAmount;
        return $this;
    }
    /**
     * @return float|null
     */
    public function getReceivedAmount(): ?float
    {
        return $this->receivedAmount;
    }
    /**
     * @param float|null $receivedAmount
     *
     * @return self
     */
    public function setReceivedAmount(?float $receivedAmount): self
    {
        $this->initialized['receivedAmount'] = true;
        $this->receivedAmount = $receivedAmount;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }
    /**
     * @param string|null $address
     *
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }
    /**
     * @param string|null $status
     *
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }
    /**
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?iterable
    {
        return $this->metadata;
    }
    /**
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
    /**
     * @return string|null
     */
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }
    /**
     * @param string|null $expiresAt
     *
     * @return self
     */
    public function setExpiresAt(?string $expiresAt): self
    {
        $this->initialized['expiresAt'] = true;
        $this->expiresAt = $expiresAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }
    /**
     * @param string|null $completedAt
     *
     * @return self
     */
    public function setCompletedAt(?string $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }
    /**
     * @param string|null $createdAt
     *
     * @return self
     */
    public function setCreatedAt(?string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }
    /**
     * @param string|null $updatedAt
     *
     * @return self
     */
    public function setUpdatedAt(?string $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * @return bool|null
     */
    public function getDemo(): ?bool
    {
        return $this->demo;
    }
    /**
     * @param bool|null $demo
     *
     * @return self
     */
    public function setDemo(?bool $demo): self
    {
        $this->initialized['demo'] = true;
        $this->demo = $demo;
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
}