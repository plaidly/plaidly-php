<?php

namespace Plaidly\Generated\Model;

class RequestPayoutRequest
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
     * Blockchain address to send the payout to
     *
     * @var string|null
     */
    protected $destinationAddress;
    /**
     * Amount to pay out
     *
     * @var float|null
     */
    protected $amount;
    /**
     * Token symbol (e.g. SOL, ETH)
     *
     * @var string|null
     */
    protected $tokenSymbol;
    /**
     * Blockchain network (e.g. solana, ethereum)
     *
     * @var string|null
     */
    protected $network;
    /**
     * Blockchain address to send the payout to
     *
     * @return string|null
     */
    public function getDestinationAddress(): ?string
    {
        return $this->destinationAddress;
    }
    /**
     * Blockchain address to send the payout to
     *
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
     * Amount to pay out
     *
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }
    /**
     * Amount to pay out
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
     * Token symbol (e.g. SOL, ETH)
     *
     * @return string|null
     */
    public function getTokenSymbol(): ?string
    {
        return $this->tokenSymbol;
    }
    /**
     * Token symbol (e.g. SOL, ETH)
     *
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
     * Blockchain network (e.g. solana, ethereum)
     *
     * @return string|null
     */
    public function getNetwork(): ?string
    {
        return $this->network;
    }
    /**
     * Blockchain network (e.g. solana, ethereum)
     *
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
}