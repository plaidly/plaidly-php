<?php

namespace Plaidly\Generated\Model;

class SweepResponse
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
    protected $sweepTxHash;
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
    public function getSweepTxHash(): ?string
    {
        return $this->sweepTxHash;
    }
    /**
     * @param string|null $sweepTxHash
     *
     * @return self
     */
    public function setSweepTxHash(?string $sweepTxHash): self
    {
        $this->initialized['sweepTxHash'] = true;
        $this->sweepTxHash = $sweepTxHash;
        return $this;
    }
}