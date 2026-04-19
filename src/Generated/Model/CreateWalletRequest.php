<?php

namespace Plaidly\Generated\Model;

class CreateWalletRequest
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
    protected $userId;
    /**
     * @var string|null
     */
    protected $chain;
    /**
     * @var string|null
     */
    protected $token;
    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }
    /**
     * @param string|null $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;
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
}