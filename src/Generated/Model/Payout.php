<?php

namespace Plaidly\Generated\Model;

class Payout
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
    protected $merchantId;
    /**
     * @var string|null
     */
    protected $destinationAddress;
    /**
     * @var float|null
     */
    protected $amount;
    /**
     * @var string|null
     */
    protected $tokenSymbol;
    /**
     * @var string|null
     */
    protected $network;
    /**
     * @var string|null
     */
    protected $txHash;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $requestedAt;
    /**
     * @var string|null
     */
    protected $sentAt;
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
     * @return string|null
     */
    public function getDestinationAddress(): ?string
    {
        return $this->destinationAddress;
    }
    /**
     * @param string|null $destinationAddress
     *
     * @return self
     */
    public function setDestinationAddress(?string $destinationAddress): self
    {
        $this->initialized['destinationAddress'] = true;
        $this->destinationAddress = $destinationAddress;
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
    public function getTokenSymbol(): ?string
    {
        return $this->tokenSymbol;
    }
    /**
     * @param string|null $tokenSymbol
     *
     * @return self
     */
    public function setTokenSymbol(?string $tokenSymbol): self
    {
        $this->initialized['tokenSymbol'] = true;
        $this->tokenSymbol = $tokenSymbol;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getNetwork(): ?string
    {
        return $this->network;
    }
    /**
     * @param string|null $network
     *
     * @return self
     */
    public function setNetwork(?string $network): self
    {
        $this->initialized['network'] = true;
        $this->network = $network;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getTxHash(): ?string
    {
        return $this->txHash;
    }
    /**
     * @param string|null $txHash
     *
     * @return self
     */
    public function setTxHash(?string $txHash): self
    {
        $this->initialized['txHash'] = true;
        $this->txHash = $txHash;
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
     * @return string|null
     */
    public function getRequestedAt(): ?string
    {
        return $this->requestedAt;
    }
    /**
     * @param string|null $requestedAt
     *
     * @return self
     */
    public function setRequestedAt(?string $requestedAt): self
    {
        $this->initialized['requestedAt'] = true;
        $this->requestedAt = $requestedAt;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getSentAt(): ?string
    {
        return $this->sentAt;
    }
    /**
     * @param string|null $sentAt
     *
     * @return self
     */
    public function setSentAt(?string $sentAt): self
    {
        $this->initialized['sentAt'] = true;
        $this->sentAt = $sentAt;
        return $this;
    }
}