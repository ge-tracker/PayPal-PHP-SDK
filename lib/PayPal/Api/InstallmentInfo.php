<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class InstallmentInfo
 *
 *  A resource representing installment information available for a transaction
 *
 * @package PayPal\Api
 *
 * @property string installment_id
 * @property string network
 * @property string issuer
 * @property \PayPal\Api\InstallmentOption[] installment_options
 */
class InstallmentInfo extends PayPalModel
{
    /**
     * Installment id.
     *
     * @param string $installment_id
     *
     * @return $this
     */
    public function setInstallmentId($installment_id): self
    {
        $this->installment_id = $installment_id;
        return $this;
    }

    /**
     * Installment id.
     *
     * @return string
     */
    public function getInstallmentId(): string
    {
        return $this->installment_id;
    }

    /**
     * Credit card network.
     * Valid Values: ["VISA", "MASTERCARD"]
     *
     * @param string $network
     *
     * @return $this
     */
    public function setNetwork($network): self
    {
        $this->network = $network;
        return $this;
    }

    /**
     * Credit card network.
     *
     * @return string
     */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /**
     * Credit card issuer.
     *
     * @param string $issuer
     *
     * @return $this
     */
    public function setIssuer($issuer): self
    {
        $this->issuer = $issuer;
        return $this;
    }

    /**
     * Credit card issuer.
     *
     * @return string
     */
    public function getIssuer(): string
    {
        return $this->issuer;
    }

    /**
     * List of available installment options and the cost associated with each one.
     *
     * @param \PayPal\Api\InstallmentOption[] $installment_options
     *
     * @return $this
     */
    public function setInstallmentOptions($installment_options): self
    {
        $this->installment_options = $installment_options;
        return $this;
    }

    /**
     * List of available installment options and the cost associated with each one.
     *
     * @return \PayPal\Api\InstallmentOption[]
     */
    public function getInstallmentOptions(): array
    {
        return $this->installment_options;
    }

    /**
     * Append InstallmentOptions to the list.
     *
     * @param \PayPal\Api\InstallmentOption $installmentOption
     * @return $this
     */
    public function addInstallmentOption($installmentOption): ?self
    {
        if (!$this->getInstallmentOptions()) {
            return $this->setInstallmentOptions(array($installmentOption));
        } else {
            return $this->setInstallmentOptions(
                array_merge($this->getInstallmentOptions(), array($installmentOption))
            );
        }
    }

    /**
     * Remove InstallmentOptions from the list.
     *
     * @param \PayPal\Api\InstallmentOption $installmentOption
     * @return $this
     */
    public function removeInstallmentOption($installmentOption): self
    {
        return $this->setInstallmentOptions(
            array_diff($this->getInstallmentOptions(), array($installmentOption))
        );
    }

}
