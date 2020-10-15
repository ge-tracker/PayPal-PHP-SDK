<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;


/**
 * Class FullName
 *
 * Full name of a subscription customer.
 *
 * @property string full_name
 *
 */
class FullName extends PayPalResourceModel
{
    /**
     * @param string $full_name
     *
     * @return self
     */
    public function setFullName($full_name): self
    {
        $this->full_name = $full_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }
}
