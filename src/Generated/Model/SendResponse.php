<?php

namespace Plaidly\Generated\Model;

class SendResponse
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
     * @var bool|null
     */
    protected $success;
    /**
     * @var string|null
     */
    protected $txHash;
    /**
     * @return bool|null
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }
    /**
     * @param bool|null $success
     *
     * @return self
     */
    public function setSuccess(?bool $success): self
    {
        $this->initialized['success'] = true;
        $this->success = $success;
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
}