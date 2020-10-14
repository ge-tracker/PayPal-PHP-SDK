<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PaymentDefinition
 *
 * Resource representing payment definition scheduling information.
 *
 *
 * @property string                   service_type
 * @property bool                     auto_bill_outstanding
 * @property \PayPal\Api\CurrencyRest setup_fee
 * @property string                   setup_fee_failure_action
 * @property int                      payment_failure_threshold
 */
class PaymentPreferences extends PayPalModel
{
    public function setServiceType($service_type)
    {
        $this->service_type = $service_type;

        return $this;
    }

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->service_type;
    }

    public function setAutoBillOutstanding($auto_bill_outstanding)
    {
        $this->auto_bill_outstanding = $auto_bill_outstanding;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAutoBillOutstanding()
    {
        return $this->auto_bill_outstanding;
    }

    /**
     * Amount that will be charged at the end of each cycle for this payment definition.
     *
     * @param \PayPal\Api\CurrencyRest $setup_fee
     *
     * @return $this
     */
    public function setSetupFee($setup_fee)
    {
        $this->setup_fee = $setup_fee;

        return $this;
    }

    /**
     * Amount that will be charged at the end of each cycle for this payment definition.
     *
     * @return \PayPal\Api\CurrencyRest
     */
    public function getSetupFee()
    {
        return $this->setup_fee;
    }

    public function setSetupFeeFailureAction($setup_fee_failure_action)
    {
        $this->setup_fee_failure_action = $setup_fee_failure_action;

        return $this;
    }

    /**
     * @return string
     */
    public function getSetupFeeFailureAction()
    {
        return $this->setup_fee_failure_action;
    }

    public function setPaymentFailureThreshold($payment_failure_threshold)
    {
        $this->payment_failure_threshold = $payment_failure_threshold;

        return $this;
    }

    /**
     * @return int
     */
    public function getPaymentFailureThreshold()
    {
        return $this->payment_failure_threshold;
    }
}
