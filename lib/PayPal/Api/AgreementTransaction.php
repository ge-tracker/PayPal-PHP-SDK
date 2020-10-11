<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class AgreementTransaction
 *
 * A resource representing an agreement_transaction that is returned during a transaction search.
 *
 * @package PayPal\Api
 *
 * @property string transaction_id
 * @property string status
 * @property string transaction_type
 * @property \PayPal\Api\Currency amount
 * @property \PayPal\Api\Currency fee_amount
 * @property \PayPal\Api\Currency net_amount
 * @property string payer_email
 * @property string payer_name
 * @property string time_stamp
 * @property string time_zone
 */
class AgreementTransaction extends PayPalModel
{
    /**
     * Id corresponding to this transaction.
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
     * Id corresponding to this transaction.
     *
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * State of the subscription at this time.
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
     * State of the subscription at this time.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Type of transaction, usually Recurring Payment.
     *
     * @param string $transaction_type
     *
     * @return $this
     */
    public function setTransactionType($transaction_type): self
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * Type of transaction, usually Recurring Payment.
     *
     * @return string
     */
    public function getTransactionType(): string
    {
        return $this->transaction_type;
    }

    /**
     * Amount for this transaction.
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
     * Amount for this transaction.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

    /**
     * Fee amount for this transaction.
     *
     * @param \PayPal\Api\Currency $fee_amount
     *
     * @return $this
     */
    public function setFeeAmount($fee_amount): self
    {
        $this->fee_amount = $fee_amount;
        return $this;
    }

    /**
     * Fee amount for this transaction.
     *
     * @return \PayPal\Api\Currency
     */
    public function getFeeAmount(): Currency
    {
        return $this->fee_amount;
    }

    /**
     * Net amount for this transaction.
     *
     * @param \PayPal\Api\Currency $net_amount
     *
     * @return $this
     */
    public function setNetAmount($net_amount): self
    {
        $this->net_amount = $net_amount;
        return $this;
    }

    /**
     * Net amount for this transaction.
     *
     * @return \PayPal\Api\Currency
     */
    public function getNetAmount(): Currency
    {
        return $this->net_amount;
    }

    /**
     * Email id of payer.
     *
     * @param string $payer_email
     *
     * @return $this
     */
    public function setPayerEmail($payer_email): self
    {
        $this->payer_email = $payer_email;
        return $this;
    }

    /**
     * Email id of payer.
     *
     * @return string
     */
    public function getPayerEmail(): string
    {
        return $this->payer_email;
    }

    /**
     * Business name of payer.
     *
     * @param string $payer_name
     *
     * @return $this
     */
    public function setPayerName($payer_name): self
    {
        $this->payer_name = $payer_name;
        return $this;
    }

    /**
     * Business name of payer.
     *
     * @return string
     */
    public function getPayerName(): string
    {
        return $this->payer_name;
    }

    /**
     * Time at which this transaction happened.
     *
     * @param string $time_stamp
     *
     * @return $this
     */
    public function setTimeStamp($time_stamp): self
    {
        $this->time_stamp = $time_stamp;
        return $this;
    }

    /**
     * Time at which this transaction happened.
     *
     * @return string
     */
    public function getTimeStamp(): string
    {
        return $this->time_stamp;
    }

    /**
     * Time zone of time_updated field.
     *
     * @param string $time_zone
     *
     * @return $this
     */
    public function setTimeZone($time_zone): self
    {
        $this->time_zone = $time_zone;
        return $this;
    }

    /**
     * Time zone of time_updated field.
     *
     * @return string
     */
    public function getTimeZone(): string
    {
        return $this->time_zone;
    }

}
