<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;

/**
 * Class LastPayment
 *
 * Date and amount of the last payment on a subscription..
 *
 * @property \PayPal\Api\CurrencyRest amount
 * @property string                   time
 *
 */
class LastPayment extends PayPalResourceModel
{
    /**
     * @param \PayPal\Api\CurrencyRest $amount
     *
     * @return self
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getAmount()
    {
        return $this->amount;
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
