<?php

namespace PayPal\Api;

use PayPal\Api\CurrencyRest;
use PayPal\Api\CycleExecutions;
use PayPal\Api\LastPayment;
use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class SubscriptionBillingInfo
 *
 * Current and historical billing information.
 *
 * @property \PayPal\Api\CurrencyRest outstanding_balance
 * @property \PayPal\Api\CycleExecutions[] cycle_executions
 * @property \PayPal\Api\LastPayment last_payment
 * @property string next_billing_time
 * @property int failed_payments_count
 */
class SubscriptionBillingInfo extends PayPalResourceModel
{
    /**
     * @param \PayPal\Api\CurrencyRest $outstanding_balance
     *
     * @return self
     */
    public function setOutstandingBalance($outstanding_balance): self
    {
        $this->outstanding_balance = $outstanding_balance;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getOutstandingBalance()
    {
        return $this->outstanding_balance;
    }

    /**
     * @param \PayPal\Api\CycleExecutions[] $cycle_executions
     *
     * @return self
     */
    public function setCycleExecutions($cycle_executions): self
    {
        $this->cycle_executions = $cycle_executions;

        return $this;
    }

    /**
     * @return \PayPal\Api\CycleExecutions[]
     */
    public function getCycleExecutions()
    {
        return $this->cycle_executions;
    }

    /**
     * @param \PayPal\Api\LastPayment $last_payment
     *
     * @return self
     */
    public function setLastPayment($last_payment): self
    {
        $this->last_payment = $last_payment;

        return $this;
    }

    /**
     * @return \PayPal\Api\LastPayment
     */
    public function getLastPayment()
    {
        return $this->last_payment;
    }

    /**
     * @param string $next_billing_time
     *
     * @return self
     */
    public function setNextBillingTime($next_billing_time): self
    {
        $this->next_billing_time = $next_billing_time;

        return $this;
    }

    /**
     * @return string
     */
    public function getNextBillingTime()
    {
        return $this->next_billing_time;
    }

    /**
     * @param int $failed_payments_count
     *
     * @return self
     */
    public function setFailedPaymentsCount($failed_payments_count): self
    {
        $this->failed_payments_count = $failed_payments_count;

        return $this;
    }

    /**
     * @return int
     */
    public function getFailedPaymentsCount()
    {
        return $this->failed_payments_count;
    }
}
