<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class ChargeModel
 *
 * A resource representing a charge model for a payment definition.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string type
 * @property \PayPal\Api\Currency amount
 */
class ChargeModel extends PayPalModel
{
    /**
     * Identifier of the charge model. 128 characters max.
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
     * Identifier of the charge model. 128 characters max.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Type of charge model. Allowed values: `SHIPPING`, `TAX`.
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
     * Type of charge model. Allowed values: `SHIPPING`, `TAX`.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Specific amount for this charge model.
     *
     * @param \PayPal\Api\Currency $amount
     *
     * @return $this
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Specific amount for this charge model.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

}
