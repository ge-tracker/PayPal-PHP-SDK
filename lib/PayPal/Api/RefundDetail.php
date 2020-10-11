<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class RefundDetail
 *
 * Invoicing refund information.
 *
 * @package PayPal\Api
 *
 * @property string type
 * @property string transaction_id
 * @property string date
 * @property string note
 * @property \PayPal\Api\Currency amount
 */
class RefundDetail extends PayPalModel
{
    /**
     * The PayPal refund type. Indicates whether refund was paid in invoicing flow through PayPal or externally. In the case of mark-as-refunded API, the supported refund type is `EXTERNAL`. For backward compatability, the `PAYPAL` refund type is still supported.
     * Valid Values: ["PAYPAL", "EXTERNAL"]
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The PayPal refund type. Indicates whether refund was paid in invoicing flow through PayPal or externally. In the case of mark-as-refunded API, the supported refund type is `EXTERNAL`. For backward compatability, the `PAYPAL` refund type is still supported.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The PayPal refund transaction ID. Required with the `PAYPAL` refund type.
     *
     * @param string $transaction_id
     *
     * @return $this
     */
    public function setTransactionId($transaction_id): self
    {
        $this->transaction_id = $transaction_id;
        return $this;
    }

    /**
     * The PayPal refund transaction ID. Required with the `PAYPAL` refund type.
     *
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * Date on which the invoice was refunded. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST.
     *
     * @param string $date
     *
     * @return $this
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Date on which the invoice was refunded. Date format: yyyy-MM-dd z. For example, 2014-02-27 PST.
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Optional note associated with the refund.
     *
     * @param string $note
     *
     * @return $this
     */
    public function setNote($note): self
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Optional note associated with the refund.
     *
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * Amount to be recorded as refund against invoice. If this field is not passed, the total invoice paid amount is recorded as refund.
     *
     * @param \PayPal\Api\Currency $amount
     *
     * @return $this
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Amount to be recorded as refund against invoice. If this field is not passed, the total invoice paid amount is recorded as refund.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

}
