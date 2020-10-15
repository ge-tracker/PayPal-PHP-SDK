<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\FullName;
use PayPal\Api\SubscriptionAddress;

/**
 * Class SubscriptionShippingAddress
 *
 * Shipping address for a subscriber.
 *
 * @property \PayPal\Api\FullName name
 * @property \PayPal\Api\SubscriptionAddress address
 *
 */
class SubscriptionShippingAddress extends PayPalResourceModel
{
    /**
     * @param \PayPal\Api\FullName $name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return \PayPal\Api\FullName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \PayPal\Api\SubscriptionAddress $address
     *
     * @return self
     */
    public function setAddress($address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return \PayPal\Api\SubscriptionAddress
     */
    public function getAddress()
    {
        return $this->address;
    }
}
