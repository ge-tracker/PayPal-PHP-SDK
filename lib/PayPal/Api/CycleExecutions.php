<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class CycleExecutions
 *
 * Cycle execution resource that will be used to represent a billing cycle.
 *
 * @property string tenure_type
 * @property int sequence
 * @property int cycles_completed
 * @property int cycles_remaining
 * @property int total_cycles
 */
class CycleExecutions extends PayPalResourceModel
{
    /**
     * @param string $tenure_type
     *
     * @return self
     */
    public function setTenureType($tenure_type): self
    {
        $this->tenure_type = $tenure_type;

        return $this;
    }

    /**
     * @return string
     */
    public function getTenureType()
    {
        return $this->tenure_type;
    }

    /**
     * @param int $sequence
     *
     * @return self
     */
    public function setSequence($sequence): self
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * @return int
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param int $cycles_completed
     *
     * @return self
     */
    public function setCyclesCompleted($cycles_completed): self
    {
        $this->cycles_completed = $cycles_completed;

        return $this;
    }

    /**
     * @return int
     */
    public function getCyclesCompleted()
    {
        return $this->cycles_completed;
    }

    /**
     * @param int $cycles_remaining
     *
     * @return self
     */
    public function setCyclesRemaining($cycles_remaining): self
    {
        $this->cycles_remaining = $cycles_remaining;

        return $this;
    }

    /**
     * @return int
     */
    public function getCyclesRemaining()
    {
        return $this->cycles_remaining;
    }

    /**
     * @param int $total_cycles
     *
     * @return self
     */
    public function setTotalCycles($total_cycles): self
    {
        $this->total_cycles = $total_cycles;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCycles()
    {
        return $this->total_cycles;
    }
}
