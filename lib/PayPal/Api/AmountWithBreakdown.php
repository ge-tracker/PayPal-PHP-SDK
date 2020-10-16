<?php

namespace PayPal\Api;

use PayPal\Api\CurrencyRest;
use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class AmountWithBreakdown
 *
 * Breakdown of a transaction showing gross, fee and net amounts.
 *
 * @property \PayPal\Api\CurrencyRest gross_amount
 * @property \PayPal\Api\CurrencyRest fee_amount
 * @property \PayPal\Api\CurrencyRest net_amount
 * @property string time
 */
class AmountWithBreakdown extends PayPalResourceModel
{
    /**
     * @param \PayPal\Api\CurrencyRest $gross_amount
     *
     * @return self
     */
    public function setGrossAmount($gross_amount): self
    {
        $this->gross_amount = $gross_amount;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getGrossAmount()
    {
        return $this->gross_amount;
    }

    /**
     * @param \PayPal\Api\CurrencyRest $fee_amount
     *
     * @return self
     */
    public function setFeeAmount($fee_amount): self
    {
        $this->fee_amount = $fee_amount;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getFeeAmount()
    {
        return $this->fee_amount;
    }

    /**
     * @param \PayPal\Api\CurrencyRest $net_amount
     *
     * @return self
     */
    public function setNetAmount($net_amount): self
    {
        $this->net_amount = $net_amount;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getNetAmount()
    {
        return $this->net_amount;
    }

    /**
     * @param string $time
     *
     * @return self
     */
    public function setTime($time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }
}
