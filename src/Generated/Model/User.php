<?php

namespace Plaidly\Generated\Model;

class User
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
     * User's ID
     *
     * @var string|null
     */
    protected $id;
    /**
     * The user's personal wallet address
     *
     * @var string|null
     */
    protected $personalWalletAddress;
    /**
     * The address of the wallet created for the user
     *
     * @var string|null
     */
    protected $createdWalletAddress;
    /**
     * The last login timestamp in Unix format
     *
     * @var string|null
     */
    protected $lastLoginAt;
    /**
     * User's ID
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * User's ID
     *
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
     * The user's personal wallet address
     *
     * @return string|null
     */
    public function getPersonalWalletAddress(): ?string
    {
        return $this->personalWalletAddress;
    }
    /**
     * The user's personal wallet address
     *
     * @param string|null $personalWalletAddress
     *
     * @return self
     */
    public function setPersonalWalletAddress(?string $personalWalletAddress): self
    {
        $this->initialized['personalWalletAddress'] = true;
        $this->personalWalletAddress = $personalWalletAddress;
        return $this;
    }
    /**
     * The address of the wallet created for the user
     *
     * @return string|null
     */
    public function getCreatedWalletAddress(): ?string
    {
        return $this->createdWalletAddress;
    }
    /**
     * The address of the wallet created for the user
     *
     * @param string|null $createdWalletAddress
     *
     * @return self
     */
    public function setCreatedWalletAddress(?string $createdWalletAddress): self
    {
        $this->initialized['createdWalletAddress'] = true;
        $this->createdWalletAddress = $createdWalletAddress;
        return $this;
    }
    /**
     * The last login timestamp in Unix format
     *
     * @return string|null
     */
    public function getLastLoginAt(): ?string
    {
        return $this->lastLoginAt;
    }
    /**
     * The last login timestamp in Unix format
     *
     * @param string|null $lastLoginAt
     *
     * @return self
     */
    public function setLastLoginAt(?string $lastLoginAt): self
    {
        $this->initialized['lastLoginAt'] = true;
        $this->lastLoginAt = $lastLoginAt;
        return $this;
    }
}