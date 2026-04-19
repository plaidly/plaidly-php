<?php

namespace Plaidly\Generated\Model;

class Merchant
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
    protected $name;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * API key for authenticating requests
     *
     * @var string|null
     */
    protected $apiKey;
    /**
     * @var string|null
     */
    protected $webhookUrl;
    /**
     * @var int|null
     */
    protected $rateLimitPerMinute;
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
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    /**
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;
        return $this;
    }
    /**
     * API key for authenticating requests
     *
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }
    /**
     * API key for authenticating requests
     *
     * @param string|null $apiKey
     *
     * @return self
     */
    public function setApiKey(?string $apiKey): self
    {
        $this->initialized['apiKey'] = true;
        $this->apiKey = $apiKey;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getWebhookUrl(): ?string
    {
        return $this->webhookUrl;
    }
    /**
     * @param string|null $webhookUrl
     *
     * @return self
     */
    public function setWebhookUrl(?string $webhookUrl): self
    {
        $this->initialized['webhookUrl'] = true;
        $this->webhookUrl = $webhookUrl;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getRateLimitPerMinute(): ?int
    {
        return $this->rateLimitPerMinute;
    }
    /**
     * @param int|null $rateLimitPerMinute
     *
     * @return self
     */
    public function setRateLimitPerMinute(?int $rateLimitPerMinute): self
    {
        $this->initialized['rateLimitPerMinute'] = true;
        $this->rateLimitPerMinute = $rateLimitPerMinute;
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