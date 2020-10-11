<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class BaseAddress
 *
 * Base Address object used as billing address in a payment or extended for Shipping Address.
 *
 * @package PayPal\Api
 *
 * @property string line1
 * @property string line2
 * @property string city
 * @property string country_code
 * @property string postal_code
 * @property string state
 * @property string normalization_status
 * @property string status
 */
class BaseAddress extends PayPalModel
{
    /**
     * Line 1 of the Address (eg. number, street, etc).
     *
     * @param string $line1
     *
     * @return $this
     */
    public function setLine1($line1): self
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * Line 1 of the Address (eg. number, street, etc).
     *
     * @return string
     */
    public function getLine1(): string
    {
        return $this->line1;
    }

    /**
     * Optional line 2 of the Address (eg. suite, apt #, etc.).
     *
     * @param string $line2
     *
     * @return $this
     */
    public function setLine2($line2): self
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * Optional line 2 of the Address (eg. suite, apt #, etc.).
     *
     * @return string
     */
    public function getLine2(): string
    {
        return $this->line2;
    }

    /**
     * City name.
     *
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * City name.
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * 2 letter country code.
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
     * 2 letter country code.
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    /**
     * Zip code or equivalent is usually required for countries that have them. For list of countries that do not have postal codes please refer to http://en.wikipedia.org/wiki/Postal_code.
     *
     * @param string $postal_code
     *
     * @return $this
     */
    public function setPostalCode($postal_code): self
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    /**
     * Zip code or equivalent is usually required for countries that have them. For list of countries that do not have postal codes please refer to http://en.wikipedia.org/wiki/Postal_code.
     *
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    /**
     * 2 letter code for US states, and the equivalent for other countries.
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * 2 letter code for US states, and the equivalent for other countries.
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Address normalization status
     * Valid Values: ["UNKNOWN", "UNNORMALIZED_USER_PREFERRED", "NORMALIZED", "UNNORMALIZED"]
     *
     * @param string $normalization_status
     *
     * @return $this
     */
    public function setNormalizationStatus($normalization_status): self
    {
        $this->normalization_status = $normalization_status;
        return $this;
    }

    /**
     * Address normalization status
     *
     * @return string
     */
    public function getNormalizationStatus(): string
    {
        return $this->normalization_status;
    }

    /**
     * Address status
     * Valid Values: ["CONFIRMED", "UNCONFIRMED"]
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Address status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

}
