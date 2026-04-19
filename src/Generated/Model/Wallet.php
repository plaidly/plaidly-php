<?php

namespace Plaidly\Generated\Model;

class Wallet
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
    protected $network;
    /**
     * @var string|null
     */
    protected $address;
    /**
     * @var string|null
     */
    protected $privateKeyEncrypted;
    /**
     * session, cold, or hot
     *
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $assignedSessionId;
    /**
     * @var string|null
     */
    protected $createdAt;
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
    public function getPrivateKeyEncrypted(): ?string
    {
        return $this->privateKeyEncrypted;
    }
    /**
     * @param string|null $privateKeyEncrypted
     *
     * @return self
     */
    public function setPrivateKeyEncrypted(?string $privateKeyEncrypted): self
    {
        $this->initialized['privateKeyEncrypted'] = true;
        $this->privateKeyEncrypted = $privateKeyEncrypted;
        return $this;
    }
    /**
     * session, cold, or hot
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }
    /**
     * session, cold, or hot
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getAssignedSessionId(): ?string
    {
        return $this->assignedSessionId;
    }
    /**
     * @param string|null $assignedSessionId
     *
     * @return self
     */
    public function setAssignedSessionId(?string $assignedSessionId): self
    {
        $this->initialized['assignedSessionId'] = true;
        $this->assignedSessionId = $assignedSessionId;
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
}