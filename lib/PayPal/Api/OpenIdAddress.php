<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class OpenIdAddress
 *
 * End-User's preferred address.
 *
 * @package PayPal\Api
 *
 * @property string street_address
 * @property string locality
 * @property string region
 * @property string postal_code
 * @property string country
 */
class OpenIdAddress extends PayPalModel
{
    /**
     * Full street address component, which may include house number, street name.
     *
     * @param string $street_address
     * @return self
     */
    public function setStreetAddress($street_address): self
    {
        $this->street_address = $street_address;
        return $this;
    }

    /**
     * Full street address component, which may include house number, street name.
     *
     * @return string
     */
    public function getStreetAddress(): string
    {
        return $this->street_address;
    }

    /**
     * City or locality component.
     *
     * @param string $locality
     * @return self
     */
    public function setLocality($locality): self
    {
        $this->locality = $locality;
        return $this;
    }

    /**
     * City or locality component.
     *
     * @return string
     */
    public function getLocality(): string
    {
        return $this->locality;
    }

    /**
     * State, province, prefecture or region component.
     *
     * @param string $region
     * @return self
     */
    public function setRegion($region): self
    {
        $this->region = $region;
        return $this;
    }

    /**
     * State, province, prefecture or region component.
     *
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * Zip code or postal code component.
     *
     * @param string $postal_code
     * @return self
     */
    public function setPostalCode($postal_code): self
    {
        $this->postal_code = $postal_code;
        return $this;
    }

    /**
     * Zip code or postal code component.
     *
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postal_code;
    }

    /**
     * Country name component.
     *
     * @param string $country
     * @return self
     */
    public function setCountry($country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Country name component.
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }


}
