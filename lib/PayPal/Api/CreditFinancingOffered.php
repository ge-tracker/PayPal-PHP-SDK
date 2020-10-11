<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class CreditFinancingOffered
 *
 * Credit financing offered to customer on PayPal side with opt-in/opt-out status
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\Currency total_cost
 * @property \PayPal\Api\number term
 * @property \PayPal\Api\Currency monthly_payment
 * @property \PayPal\Api\Currency total_interest
 * @property bool payer_acceptance
 * @property bool cart_amount_immutable
 */
class CreditFinancingOffered extends PayPalModel
{
    /**
     * This is the estimated total payment amount including interest and fees the user will pay during the lifetime of the loan.
     *
     * @param \PayPal\Api\Currency $total_cost
     *
     * @return $this
     */
    public function setTotalCost($total_cost): self
    {
        $this->total_cost = $total_cost;
        return $this;
    }

    /**
     * This is the estimated total payment amount including interest and fees the user will pay during the lifetime of the loan.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotalCost(): Currency
    {
        return $this->total_cost;
    }

    /**
     * Length of financing terms in month
     *
     * @param \PayPal\Api\number $term
     *
     * @return $this
     */
    public function setTerm($term): self
    {
        $this->term = $term;
        return $this;
    }

    /**
     * Length of financing terms in month
     *
     * @return \PayPal\Api\number
     */
    public function getTerm(): number
    {
        return $this->term;
    }

    /**
     * This is the estimated amount per month that the customer will need to pay including fees and interest.
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
     * This is the estimated amount per month that the customer will need to pay including fees and interest.
     *
     * @return \PayPal\Api\Currency
     */
    public function getMonthlyPayment(): Currency
    {
        return $this->monthly_payment;
    }

    /**
     * Estimated interest or fees amount the payer will have to pay during the lifetime of the loan.
     *
     * @param \PayPal\Api\Currency $total_interest
     *
     * @return $this
     */
    public function setTotalInterest($total_interest): self
    {
        $this->total_interest = $total_interest;
        return $this;
    }

    /**
     * Estimated interest or fees amount the payer will have to pay during the lifetime of the loan.
     *
     * @return \PayPal\Api\Currency
     */
    public function getTotalInterest(): Currency
    {
        return $this->total_interest;
    }

    /**
     * Status on whether the customer ultimately was approved for and chose to make the payment using the approved installment credit.
     *
     * @param bool $payer_acceptance
     *
     * @return $this
     */
    public function setPayerAcceptance($payer_acceptance): self
    {
        $this->payer_acceptance = $payer_acceptance;
        return $this;
    }

    /**
     * Status on whether the customer ultimately was approved for and chose to make the payment using the approved installment credit.
     *
     * @return bool
     */
    public function getPayerAcceptance(): bool
    {
        return $this->payer_acceptance;
    }

    /**
     * Indicates whether the cart amount is editable after payer's acceptance on PayPal side
     *
     * @param bool $cart_amount_immutable
     *
     * @return $this
     */
    public function setCartAmountImmutable($cart_amount_immutable): self
    {
        $this->cart_amount_immutable = $cart_amount_immutable;
        return $this;
    }

    /**
     * Indicates whether the cart amount is editable after payer's acceptance on PayPal side
     *
     * @return bool
     */
    public function getCartAmountImmutable(): bool
    {
        return $this->cart_amount_immutable;
    }

}
