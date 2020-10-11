<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PaymentDefinition
 *
 * Resource representing payment definition scheduling information.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string name
 * @property string type
 * @property string frequency_interval
 * @property string frequency
 * @property string cycles
 * @property \PayPal\Api\Currency amount
 * @property \PayPal\Api\ChargeModel[] charge_models
 */
class PaymentDefinition extends PayPalModel
{
    /**
     * Identifier of the payment_definition. 128 characters max.
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
     * Identifier of the payment_definition. 128 characters max.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Name of the payment definition. 128 characters max.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Name of the payment definition. 128 characters max.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Type of the payment definition. Allowed values: `TRIAL`, `REGULAR`.
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
     * Type of the payment definition. Allowed values: `TRIAL`, `REGULAR`.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * How frequently the customer should be charged.
     *
     * @param string $frequency_interval
     *
     * @return $this
     */
    public function setFrequencyInterval($frequency_interval): self
    {
        $this->frequency_interval = $frequency_interval;
        return $this;
    }

    /**
     * How frequently the customer should be charged.
     *
     * @return string
     */
    public function getFrequencyInterval(): string
    {
        return $this->frequency_interval;
    }

    /**
     * Frequency of the payment definition offered. Allowed values: `WEEK`, `DAY`, `YEAR`, `MONTH`.
     *
     * @param string $frequency
     *
     * @return $this
     */
    public function setFrequency($frequency): self
    {
        $this->frequency = $frequency;
        return $this;
    }

    /**
     * Frequency of the payment definition offered. Allowed values: `WEEK`, `DAY`, `YEAR`, `MONTH`.
     *
     * @return string
     */
    public function getFrequency(): string
    {
        return $this->frequency;
    }

    /**
     * Number of cycles in this payment definition.
     *
     * @param string $cycles
     *
     * @return $this
     */
    public function setCycles($cycles): self
    {
        $this->cycles = $cycles;
        return $this;
    }

    /**
     * Number of cycles in this payment definition.
     *
     * @return string
     */
    public function getCycles(): string
    {
        return $this->cycles;
    }

    /**
     * Amount that will be charged at the end of each cycle for this payment definition.
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
     * Amount that will be charged at the end of each cycle for this payment definition.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

    /**
     * Array of charge_models for this payment definition.
     *
     * @param \PayPal\Api\ChargeModel[] $charge_models
     *
     * @return $this
     */
    public function setChargeModels($charge_models): self
    {
        $this->charge_models = $charge_models;
        return $this;
    }

    /**
     * Array of charge_models for this payment definition.
     *
     * @return \PayPal\Api\ChargeModel[]
     */
    public function getChargeModels(): array
    {
        return $this->charge_models;
    }

    /**
     * Append ChargeModels to the list.
     *
     * @param \PayPal\Api\ChargeModel $chargeModel
     * @return $this
     */
    public function addChargeModel($chargeModel): ?self
    {
        if (!$this->getChargeModels()) {
            return $this->setChargeModels(array($chargeModel));
        } else {
            return $this->setChargeModels(
                array_merge($this->getChargeModels(), array($chargeModel))
            );
        }
    }

    /**
     * Remove ChargeModels from the list.
     *
     * @param \PayPal\Api\ChargeModel $chargeModel
     * @return $this
     */
    public function removeChargeModel($chargeModel): self
    {
        return $this->setChargeModels(
            array_diff($this->getChargeModels(), array($chargeModel))
        );
    }

}
