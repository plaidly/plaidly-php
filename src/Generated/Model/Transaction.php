<?php

namespace Plaidly\Generated\Model;

class Transaction
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
    protected $txHash;
    /**
     * @var string|null
     */
    protected $sessionId;
    /**
     * @var string|null
     */
    protected $network;
    /**
     * @var string|null
     */
    protected $tokenSymbol;
    /**
     * @var string|null
     */
    protected $fromAddress;
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
    protected $detectedAt;
    /**
     * @var bool|null
     */
    protected $confirmed;
    /**
     * @var int|null
     */
    protected $blockNumber;
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
    public function getFromAddress(): ?string
    {
        return $this->fromAddress;
    }
    /**
     * @param string|null $fromAddress
     *
     * @return self
     */
    public function setFromAddress(?string $fromAddress): self
    {
        $this->initialized['fromAddress'] = true;
        $this->fromAddress = $fromAddress;
        return $this;
    }
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
    public function getDetectedAt(): ?string
    {
        return $this->detectedAt;
    }
    /**
     * @param string|null $detectedAt
     *
     * @return self
     */
    public function setDetectedAt(?string $detectedAt): self
    {
        $this->initialized['detectedAt'] = true;
        $this->detectedAt = $detectedAt;
        return $this;
    }
    /**
     * @return bool|null
     */
    public function getConfirmed(): ?bool
    {
        return $this->confirmed;
    }
    /**
     * @param bool|null $confirmed
     *
     * @return self
     */
    public function setConfirmed(?bool $confirmed): self
    {
        $this->initialized['confirmed'] = true;
        $this->confirmed = $confirmed;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getBlockNumber(): ?int
    {
        return $this->blockNumber;
    }
    /**
     * @param int|null $blockNumber
     *
     * @return self
     */
    public function setBlockNumber(?int $blockNumber): self
    {
        $this->initialized['blockNumber'] = true;
        $this->blockNumber = $blockNumber;
        return $this;
    }
}