<?php

namespace Plaidly\Generated\Model;

class RegisterMerchantRequest
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
     * Merchant display name
     *
     * @var string|null
     */
    protected $name;
    /**
     * Optional webhook URL for payment notifications
     *
     * @var string|null
     */
    protected $webhookUrl;
    /**
     * Merchant display name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * Merchant display name
     *
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
     * Optional webhook URL for payment notifications
     *
     * @return string|null
     */
    public function getWebhookUrl(): ?string
    {
        return $this->webhookUrl;
    }
    /**
     * Optional webhook URL for payment notifications
     *
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
}