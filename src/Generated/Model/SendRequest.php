<?php

namespace Plaidly\Generated\Model;

class SendRequest
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
    protected $toAddress;
    /**
     * @var float|null
     */
    protected $amount;
    /**
     * @var string|null
     */
    protected $token;
    /**
     * @return string|null
     */
    public function getToAddress(): ?string
    {
        return $this->toAddress;
    }
    /**
     * @param string|null $toAddress
     *
     * @return self
     */
    public function setToAddress(?string $toAddress): self
    {
        $this->initialized['toAddress'] = true;
        $this->toAddress = $toAddress;
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
    public function getToken(): ?string
    {
        return $this->token;
    }
    /**
     * @param string|null $token
     *
     * @return self
     */
    public function setToken(?string $token): self
    {
        $this->initialized['token'] = true;
        $this->token = $token;
        return $this;
    }
}