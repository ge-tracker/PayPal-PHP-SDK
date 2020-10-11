<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Phone
 *
 * Information related to the Payee.
 *
 * @package PayPal\Api
 *
 * @property string country_code
 * @property string national_number
 * @property string extension
 */
class Phone extends PayPalModel
{
    /**
     * Country code (from in E.164 format)
     *
     * @param string $country_code
     *
     * @return $this
     */
    public function setCountryCode($country_code): self
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * Country code (from in E.164 format)
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * In-country phone number (from in E.164 format)
     *
     * @param string $national_number
     *
     * @return $this
     */
    public function setNationalNumber($national_number): self
    {
        $this->national_number = $national_number;
        return $this;
    }

    /**
     * In-country phone number (from in E.164 format)
     *
     * @return string
     */
    public function getNationalNumber(): string
    {
        return $this->national_number;
    }

    /**
     * Phone extension
     *
     * @param string $extension
     *
     * @return $this
     */
    public function setExtension($extension): self
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * Phone extension
     *
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

}
