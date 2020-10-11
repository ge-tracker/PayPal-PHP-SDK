<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Validation\NumericValidator;

/**
 * Class Details
 *
 * Additional details of the payment amount.
 *
 * @package PayPal\Api
 *
 * @property string subtotal
 * @property string shipping
 * @property string tax
 * @property string handling_fee
 * @property string shipping_discount
 * @property string insurance
 * @property string gift_wrap
 * @property string fee
 */
class Details extends PayPalModel
{
    /**
     * Amount of the subtotal of the items. **Required** if line items are specified. 10 characters max, with support for 2 decimal places.
     *
     * @param string|double $subtotal
     *
     * @return $this
     */
    public function setSubtotal($subtotal): self
    {
        NumericValidator::validate($subtotal, "Subtotal");
        $subtotal = FormatConverter::formatToPrice($subtotal);
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * Amount of the subtotal of the items. **Required** if line items are specified. 10 characters max, with support for 2 decimal places.
     *
     * @return string
     */
    public function getSubtotal(): string
    {
        return $this->subtotal;
    }

    /**
     * Amount charged for shipping. 10 characters max with support for 2 decimal places.
     *
     * @param string|double $shipping
     *
     * @return $this
     */
    public function setShipping($shipping): self
    {
        NumericValidator::validate($shipping, "Shipping");
        $shipping = FormatConverter::formatToPrice($shipping);
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Amount charged for shipping. 10 characters max with support for 2 decimal places.
     *
     * @return string
     */
    public function getShipping(): string
    {
        return $this->shipping;
    }

    /**
     * Amount charged for tax. 10 characters max with support for 2 decimal places.
     *
     * @param string|double $tax
     *
     * @return $this
     */
    public function setTax($tax): self
    {
        NumericValidator::validate($tax, "Tax");
        $tax = FormatConverter::formatToPrice($tax);
        $this->tax = $tax;
        return $this;
    }

    /**
     * Amount charged for tax. 10 characters max with support for 2 decimal places.
     *
     * @return string
     */
    public function getTax(): string
    {
        return $this->tax;
    }

    /**
     * Amount being charged for the handling fee. Only supported when the `payment_method` is set to `paypal`.
     *
     * @param string|double $handling_fee
     *
     * @return $this
     */
    public function setHandlingFee($handling_fee): self
    {
        NumericValidator::validate($handling_fee, "Handling Fee");
        $handling_fee = FormatConverter::formatToPrice($handling_fee);
        $this->handling_fee = $handling_fee;
        return $this;
    }

    /**
     * Amount being charged for the handling fee. Only supported when the `payment_method` is set to `paypal`.
     *
     * @return string
     */
    public function getHandlingFee(): string
    {
        return $this->handling_fee;
    }

    /**
     * Amount being discounted for the shipping fee. Only supported when the `payment_method` is set to `paypal`.
     *
     * @param string|double $shipping_discount
     *
     * @return $this
     */
    public function setShippingDiscount($shipping_discount): self
    {
        NumericValidator::validate($shipping_discount, "Shipping Discount");
        $shipping_discount = FormatConverter::formatToPrice($shipping_discount);
        $this->shipping_discount = $shipping_discount;
        return $this;
    }

    /**
     * Amount being discounted for the shipping fee. Only supported when the `payment_method` is set to `paypal`.
     *
     * @return string
     */
    public function getShippingDiscount(): string
    {
        return $this->shipping_discount;
    }

    /**
     * Amount being charged for the insurance fee. Only supported when the `payment_method` is set to `paypal`.
     *
     * @param string|double $insurance
     *
     * @return $this
     */
    public function setInsurance($insurance): self
    {
        NumericValidator::validate($insurance, "Insurance");
        $insurance = FormatConverter::formatToPrice($insurance);
        $this->insurance = $insurance;
        return $this;
    }

    /**
     * Amount being charged for the insurance fee. Only supported when the `payment_method` is set to `paypal`.
     *
     * @return string
     */
    public function getInsurance(): string
    {
        return $this->insurance;
    }

    /**
     * Amount being charged as gift wrap fee.
     *
     * @param string|double $gift_wrap
     *
     * @return $this
     */
    public function setGiftWrap($gift_wrap): self
    {
        NumericValidator::validate($gift_wrap, "Gift Wrap");
        $gift_wrap = FormatConverter::formatToPrice($gift_wrap);
        $this->gift_wrap = $gift_wrap;
        return $this;
    }

    /**
     * Amount being charged as gift wrap fee.
     *
     * @return string
     */
    public function getGiftWrap(): string
    {
        return $this->gift_wrap;
    }

    /**
     * Fee charged by PayPal. In case of a refund, this is the fee amount refunded to the original receipient of the payment.
     *
     * @param string|double $fee
     *
     * @return $this
     */
    public function setFee($fee): self
    {
        NumericValidator::validate($fee, "Fee");
        $fee = FormatConverter::formatToPrice($fee);
        $this->fee = $fee;
        return $this;
    }

    /**
     * Fee charged by PayPal. In case of a refund, this is the fee amount refunded to the original receipient of the payment.
     *
     * @return string
     */
    public function getFee(): string
    {
        return $this->fee;
    }

}
