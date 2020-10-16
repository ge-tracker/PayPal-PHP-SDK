<?php

namespace PayPal\Api;

use PayPal\Api\AmountWithBreakdown;
use PayPal\Api\SubscriberName;
use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class SubscriptionTransaction
 *
 * Transaction linked to a payment related to a subscription.
 *
 * @property string id
 * @property string status
 * @property string payer_email
 * @property \PayPal\Api\SubscriberName payer_name
 * @property \PayPal\Api\AmountWithBreakdown amount_with_breakdown
 */
class SubscriptionTransaction extends PayPalResourceModel
{
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $payer_email
     *
     * @return self
     */
    public function setPayerEmail($payer_email): self
    {
        $this->payer_email = $payer_email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayerEmail()
    {
        return $this->payer_email;
    }

    /**
     * @param \PayPal\Api\SubscriberName $payer_name
     *
     * @return self
     */
    public function setPayerName($payer_name): self
    {
        $this->payer_name = $payer_name;

        return $this;
    }

    /**
     * @return \PayPal\Api\SubscriberName
     */
    public function getPayerName()
    {
        return $this->payer_name;
    }

    /**
     * @param \PayPal\Api\AmountWithBreakdown $amount_with_breakdown
     *
     * @return self
     */
    public function setAmountWithBreakdown($amount_with_breakdown): self
    {
        $this->amount_with_breakdown = $amount_with_breakdown;

        return $this;
    }

    /**
     * @return \PayPal\Api\AmountWithBreakdown
     */
    public function getAmountWithBreakdown()
    {
        return $this->amount_with_breakdown;
    }
}
