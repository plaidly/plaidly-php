<?php

namespace Plaidly\Generated\Model;

class PaymentMethod
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
     * 0 = crypto, 1 = fiat
     *
     * @var int|null
     */
    protected $methodID;
    /**
     * @var string|null
     */
    protected $chain;
    /**
     * @var string|null
     */
    protected $token;
    /**
     * @var string|null
     */
    protected $network;
    /**
     * 0 = crypto, 1 = fiat
     *
     * @return int|null
     */
    public function getMethodID(): ?int
    {
        return $this->methodID;
    }
    /**
     * 0 = crypto, 1 = fiat
     *
     * @param int|null $methodID
     *
     * @return self
     */
    public function setMethodID(?int $methodID): self
    {
        $this->initialized['methodID'] = true;
        $this->methodID = $methodID;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getChain(): ?string
    {
        return $this->chain;
    }
    /**
     * @param string|null $chain
     *
     * @return self
     */
    public function setChain(?string $chain): self
    {
        $this->initialized['chain'] = true;
        $this->chain = $chain;
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
}