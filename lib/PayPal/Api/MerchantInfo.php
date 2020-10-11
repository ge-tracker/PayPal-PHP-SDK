<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class MerchantInfo
 *
 * Merchant business information that appears on the invoice.
 *
 * @package PayPal\Api
 *
 * @property string email
 * @property string first_name
 * @property string last_name
 * @property \PayPal\Api\InvoiceAddress address
 * @property string business_name
 * @property \PayPal\Api\Phone phone
 * @property \PayPal\Api\Phone fax
 * @property string website
 * @property string tax_id
 * @property string additional_info_label
 * @property string additional_info
 */
class MerchantInfo extends PayPalModel
{
    /**
     * The merchant email address. Maximum length is 260 characters.
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * The merchant email address. Maximum length is 260 characters.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * The merchant first name. Maximum length is 30 characters.
     *
     * @param string $first_name
     *
     * @return $this
     */
    public function setFirstName($first_name): self
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * The merchant first name. Maximum length is 30 characters.
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * The merchant last name. Maximum length is 30 characters.
     *
     * @param string $last_name
     *
     * @return $this
     */
    public function setLastName($last_name): self
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * The merchant last name. Maximum length is 30 characters.
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * The merchant address.
     *
     * @param \PayPal\Api\InvoiceAddress $address
     *
     * @return $this
     */
    public function setAddress($address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * The merchant address.
     *
     * @return \PayPal\Api\InvoiceAddress
     */
    public function getAddress(): InvoiceAddress
    {
        return $this->address;
    }

    /**
     * The merchant company business name. Maximum length is 100 characters.
     *
     * @param string $business_name
     *
     * @return $this
     */
    public function setBusinessName($business_name): self
    {
        $this->business_name = $business_name;
        return $this;
    }

    /**
     * The merchant company business name. Maximum length is 100 characters.
     *
     * @return string
     */
    public function getBusinessName(): string
    {
        return $this->business_name;
    }

    /**
     * The merchant phone number.
     *
     * @param \PayPal\Api\Phone $phone
     *
     * @return $this
     */
    public function setPhone($phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * The merchant phone number.
     *
     * @return \PayPal\Api\Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * The merchant fax number.
     *
     * @param \PayPal\Api\Phone $fax
     *
     * @return $this
     */
    public function setFax($fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * The merchant fax number.
     *
     * @return \PayPal\Api\Phone
     */
    public function getFax(): Phone
    {
        return $this->fax;
    }

    /**
     * The merchant website. Maximum length is 2048 characters.
     *
     * @param string $website
     *
     * @return $this
     */
    public function setWebsite($website): self
    {
        $this->website = $website;
        return $this;
    }

    /**
     * The merchant website. Maximum length is 2048 characters.
     *
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * The merchant tax ID. Maximum length is 100 characters.
     *
     * @param string $tax_id
     *
     * @return $this
     */
    public function setTaxId($tax_id): self
    {
        $this->tax_id = $tax_id;
        return $this;
    }

    /**
     * The merchant tax ID. Maximum length is 100 characters.
     *
     * @return string
     */
    public function getTaxId(): string
    {
        return $this->tax_id;
    }

    /**
     * Option to provide a label to the additional_info field. 40 characters max.
     *
     * @param string $additional_info_label
     *
     * @return $this
     */
    public function setAdditionalInfoLabel($additional_info_label): self
    {
        $this->additional_info_label = $additional_info_label;
        return $this;
    }

    /**
     * Option to provide a label to the additional_info field. 40 characters max.
     *
     * @return string
     */
    public function getAdditionalInfoLabel(): string
    {
        return $this->additional_info_label;
    }

    /**
     * Additional information, such as business hours. Maximum length is 40 characters.
     *
     * @param string $additional_info
     *
     * @return $this
     */
    public function setAdditionalInfo($additional_info): self
    {
        $this->additional_info = $additional_info;
        return $this;
    }

    /**
     * Additional information, such as business hours. Maximum length is 40 characters.
     *
     * @return string
     */
    public function getAdditionalInfo(): string
    {
        return $this->additional_info;
    }

}
