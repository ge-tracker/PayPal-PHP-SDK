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
 * @property integer sequence
 * @property integer cycles_completed
 * @property integer cycles_remaining
 * @property integer total_cycles
 *
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
     * @param integer $sequence
     *
     * @return self
     */
    public function setSequence($sequence): self
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param integer $cycles_completed
     *
     * @return self
     */
    public function setCyclesCompleted($cycles_completed): self
    {
        $this->cycles_completed = $cycles_completed;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCyclesCompleted()
    {
        return $this->cycles_completed;
    }

    /**
     * @param integer $cycles_remaining
     *
     * @return self
     */
    public function setCyclesRemaining($cycles_remaining): self
    {
        $this->cycles_remaining = $cycles_remaining;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCyclesRemaining()
    {
        return $this->cycles_remaining;
    }

    /**
     * @param integer $total_cycles
     *
     * @return self
     */
    public function setTotalCycles($total_cycles): self
    {
        $this->total_cycles = $total_cycles;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTotalCycles()
    {
        return $this->total_cycles;
    }
}
