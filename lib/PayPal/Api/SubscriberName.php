<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class SubscriberName
 *
 * Customer name.
 *
 * @property string given_name
 * @property string surname
 */
class SubscriberName extends PayPalResourceModel
{
    /**
     * @param string $given_name
     *
     * @return self
     */
    public function setGivenName($given_name): self
    {
        $this->given_name = $given_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getGivenName()
    {
        return $this->given_name;
    }

    /**
     * @param string $surname
     *
     * @return self
     */
    public function setSurname($surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }
}
