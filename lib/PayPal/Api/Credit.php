<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Credit
 *
 * A resource representing a credit instrument.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string type
 */
class Credit extends PayPalModel
{
    /**
     * Unique identifier of credit resource.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Unique identifier of credit resource.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * specifies type of credit
     * Valid Values: ["BILL_ME_LATER", "PAYPAL_EXTRAS_MASTERCARD", "EBAY_MASTERCARD", "PAYPAL_SMART_CONNECT"]
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * specifies type of credit
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

}
