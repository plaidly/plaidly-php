<?php

namespace Plaidly\Generated\Model;

class Receipt
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
    protected $id;
    /**
     * @var string|null
     */
    protected $sessionId;
    /**
     * @var string|null
     */
    protected $merchantId;
    /**
     * @var \DateTime|null
     */
    protected $issuedAt;
    /**
     * @var float|null
     */
    protected $amount;
    /**
     * @var string|null
     */
    protected $currency;
    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
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
     * @return \DateTime|null
     */
    public function getIssuedAt(): ?\DateTime
    {
        return $this->issuedAt;
    }
    /**
     * @param \DateTime|null $issuedAt
     *
     * @return self
     */
    public function setIssuedAt(?\DateTime $issuedAt): self
    {
        $this->initialized['issuedAt'] = true;
        $this->issuedAt = $issuedAt;
        return $this;
    }
    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }
    /**
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
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }
    /**
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->initialized['currency'] = true;
        $this->currency = $currency;
        return $this;
    }
}