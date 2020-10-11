<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class InstallmentOption
 *
 *  A resource describing an installment
 *
 * @package PayPal\Api
 *
 * @property int term
 * @property \PayPal\Api\Currency monthly_payment
 * @property \PayPal\Api\Currency discount_amount
 * @property string discount_percentage
 */
class InstallmentOption extends PayPalModel
{
    /**
     * Number of installments
     *
     * @param int $term
     *
     * @return $this
     */
    public function setTerm($term): self
    {
        $this->term = $term;
        return $this;
    }

    /**
     * Number of installments
     *
     * @return int
     */
    public function getTerm(): int
    {
        return $this->term;
    }

    /**
     * Monthly payment
     *
     * @param \PayPal\Api\Currency $monthly_payment
     *
     * @return $this
     */
    public function setMonthlyPayment($monthly_payment): self
    {
        $this->monthly_payment = $monthly_payment;
        return $this;
    }

    /**
     * Monthly payment
     *
     * @return \PayPal\Api\Currency
     */
    public function getMonthlyPayment(): Currency
    {
        return $this->monthly_payment;
    }

    /**
     * Discount amount applied to the payment, if any
     *
     * @param \PayPal\Api\Currency $discount_amount
     *
     * @return $this
     */
    public function setDiscountAmount($discount_amount): self
    {
        $this->discount_amount = $discount_amount;
        return $this;
    }

    /**
     * Discount amount applied to the payment, if any
     *
     * @return \PayPal\Api\Currency
     */
    public function getDiscountAmount(): Currency
    {
        return $this->discount_amount;
    }

    /**
     * Discount percentage applied to the payment, if any
     *
     * @param string $discount_percentage
     *
     * @return $this
     */
    public function setDiscountPercentage($discount_percentage): self
    {
        $this->discount_percentage = $discount_percentage;
        return $this;
    }

    /**
     * Discount percentage applied to the payment, if any
     *
     * @return string
     */
    public function getDiscountPercentage(): string
    {
        return $this->discount_percentage;
    }

}
