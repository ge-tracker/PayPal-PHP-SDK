<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PaymentSummary
 *
 * Payment/Refund break up
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\Currency paypal
 * @property \PayPal\Api\Currency other
 */
class PaymentSummary extends PayPalModel
{
    /**
     * Total Amount paid/refunded via PayPal.
     *
     * @param \PayPal\Api\Currency $paypal
     *
     * @return $this
     */
    public function setPaypal($paypal): self
    {
        $this->paypal = $paypal;
        return $this;
    }

    /**
     * Total Amount paid/refunded via PayPal.
     *
     * @return \PayPal\Api\Currency
     */
    public function getPaypal(): Currency
    {
        return $this->paypal;
    }

    /**
     * Total Amount paid/refunded via other sources.
     *
     * @param \PayPal\Api\Currency $other
     *
     * @return $this
     */
    public function setOther($other): self
    {
        $this->other = $other;
        return $this;
    }

    /**
     * Total Amount paid/refunded via other sources.
     *
     * @return \PayPal\Api\Currency
     */
    public function getOther(): Currency
    {
        return $this->other;
    }

}
