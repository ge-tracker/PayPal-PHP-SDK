<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class SubscriptionAddress
 *
 * Shipping address for a subscriber.
 *
 * @property string address_line_1
 * @property string address_line_2
 * @property string admin_area_1
 * @property string admin_area_2
 * @property string postal_code
 * @property string country_code
 */
class SubscriptionAddress extends PayPalResourceModel
{
    /**
     * @param string $address_line_1
     *
     * @return self
     */
    public function setAddressLine1($address_line_1): self
    {
        $this->address_line_1 = $address_line_1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->address_line_1;
    }

    /**
     * @param string $address_line_2
     *
     * @return self
     */
    public function setAddressLine2($address_line_2): self
    {
        $this->address_line_2 = $address_line_2;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->address_line_2;
    }

    /**
     * @param string $admin_area_1
     *
     * @return self
     */
    public function setAdminArea1($admin_area_1): self
    {
        $this->admin_area_1 = $admin_area_1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdminArea1()
    {
        return $this->admin_area_1;
    }

    /**
     * @param string $admin_area_2
     *
     * @return self
     */
    public function setAdminArea2($admin_area_2): self
    {
        $this->admin_area_2 = $admin_area_2;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdminArea2()
    {
        return $this->admin_area_2;
    }

    /**
     * @param string $postal_code
     *
     * @return self
     */
    public function setPostalCode($postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param string $country_code
     *
     * @return self
     */
    public function setCountryCode($country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }
}
