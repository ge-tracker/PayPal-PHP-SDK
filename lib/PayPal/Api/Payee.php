<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Payee
 *
 * A resource representing a Payee who receives the funds and fulfills the order.
 *
 * @package PayPal\Api
 *
 * @property string email
 * @property string merchant_id
 */
class Payee extends PayPalModel
{
    /**
     * Email Address associated with the Payee's PayPal Account. If the provided email address is not associated with any PayPal Account, the payee can only receive PayPal Wallet Payments. Direct Credit Card Payments will be denied due to card compliance requirements.
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
     * Email Address associated with the Payee's PayPal Account. If the provided email address is not associated with any PayPal Account, the payee can only receive PayPal Wallet Payments. Direct Credit Card Payments will be denied due to card compliance requirements.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Encrypted PayPal account identifier for the Payee.
     *
     * @param string $merchant_id
     *
     * @return $this
     */
    public function setMerchantId($merchant_id): self
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }

    /**
     * Encrypted PayPal account identifier for the Payee.
     *
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchant_id;
    }

    /**
     * First Name of the Payee.
     * @deprecated Not publicly available
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
     * First Name of the Payee.
     * @deprecated Not publicly available
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Last Name of the Payee.
     * @deprecated Not publicly available
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
     * Last Name of the Payee.
     * @deprecated Not publicly available
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Unencrypted PayPal account Number of the Payee
     * @deprecated Not publicly available
     * @param string $account_number
     *
     * @return $this
     */
    public function setAccountNumber($account_number): self
    {
        $this->account_number = $account_number;
        return $this;
    }

    /**
     * Unencrypted PayPal account Number of the Payee
     * @deprecated Not publicly available
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->account_number;
    }

    /**
     * Information related to the Payee.
     * @deprecated Not publicly available
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
     * Information related to the Payee.
     * @deprecated Not publicly available
     * @return \PayPal\Api\Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

}
