<?php

namespace PayPal\Api;

use PayPal\Api\SubscriberName;
use PayPal\Api\SubscriptionShippingAddress;
use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Subscriber
 *
 * Subscription customer details.
 *
 * @property \PayPal\Api\SubscriptionShippingAddress shipping_address
 * @property \PayPal\Api\SubscriberName name
 * @property string email_address
 * @property string payer_id
 */
class Subscriber extends PayPalResourceModel
{
    /**
     * @param \PayPal\Api\SubscriptionShippingAddress $shipping_address
     *
     * @return self
     */
    public function setShippingAddress($shipping_address): self
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }

    /**
     * @return \PayPal\Api\SubscriptionShippingAddress
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * @param \PayPal\Api\SubscriberName $name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \PayPal\Api\SubscriberName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $email_address
     *
     * @return self
     */
    public function setEmailAddress($email_address): self
    {
        $this->email_address = $email_address;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param string $payer_id
     *
     * @return self
     */
    public function setPayerId($payer_id): self
    {
        $this->payer_id = $payer_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayerId()
    {
        return $this->payer_id;
    }
}
