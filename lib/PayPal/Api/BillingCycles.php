<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class BillingCycles
 *
 * Resource representing payment definition scheduling information.
 *
 *
 * @property \PayPal\Api\PricingScheme pricing_scheme
 * @property \PayPal\Api\Frequency     frequency
 * @property string                    tenure_type
 * @property int                       sequence
 * @property int                       total_cycles
 */
class BillingCycles extends PayPalModel
{
    /**
     * @param \PayPal\Api\PricingScheme $pricing_scheme
     *
     * @return $this
     */
    public function setPricingScheme($pricing_scheme)
    {
        $this->pricing_scheme = $pricing_scheme;

        return $this;
    }

    /**
     * @return \PayPal\Api\PricingScheme
     */
    public function getPricingScheme()
    {
        return $this->pricing_scheme;
    }

    /**
     * @param \PayPal\Api\Frequency $frequency
     *
     * @return $this
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * @return \PayPal\Api\Frequency
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @param string $tenure_type
     *
     * @return $this
     */
    public function setTenureType($tenure_type)
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
     * @return $this
     */
    public function setSequence($sequence)
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
     * @param int $total_cycles
     *
     * @return $this
     */
    public function setTotalCycles($total_cycles)
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
