<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PayoutBatchHeader
 *
 * Batch header resource.
 *
 * @package PayPal\Api
 *
 * @property string payout_batch_id
 * @property string batch_status
 * @property string time_created
 * @property string time_completed
 * @property \PayPal\Api\PayoutSenderBatchHeader sender_batch_header
 * @property \PayPal\Api\Currency amount
 * @property \PayPal\Api\Currency fees
 * @property \PayPal\Api\Error errors
 * @property \PayPal\Api\Links[] links
 */
class PayoutBatchHeader extends PayPalModel
{
    /**
     * The PayPal-generated ID for a batch payout.
     *
     * @param string $payout_batch_id
     *
     * @return $this
     */
    public function setPayoutBatchId($payout_batch_id): self
    {
        $this->payout_batch_id = $payout_batch_id;
        return $this;
    }

    /**
     * The PayPal-generated ID for a batch payout.
     *
     * @return string
     */
    public function getPayoutBatchId(): string
    {
        return $this->payout_batch_id;
    }

    /**
     * The PayPal-generated batch payout status. If the batch payout passes the preliminary checks, the status is `PENDING`.
     *
     * @param string $batch_status
     *
     * @return $this
     */
    public function setBatchStatus($batch_status): self
    {
        $this->batch_status = $batch_status;
        return $this;
    }

    /**
     * The PayPal-generated batch payout status. If the batch payout passes the preliminary checks, the status is `PENDING`.
     *
     * @return string
     */
    public function getBatchStatus(): string
    {
        return $this->batch_status;
    }

    /**
     * The time the batch entered processing.
     *
     * @param string $time_created
     *
     * @return $this
     */
    public function setTimeCreated($time_created): self
    {
        $this->time_created = $time_created;
        return $this;
    }

    /**
     * The time the batch entered processing.
     *
     * @return string
     */
    public function getTimeCreated(): string
    {
        return $this->time_created;
    }

    /**
     * The time that processing for the batch was completed.
     *
     * @param string $time_completed
     *
     * @return $this
     */
    public function setTimeCompleted($time_completed): self
    {
        $this->time_completed = $time_completed;
        return $this;
    }

    /**
     * The time that processing for the batch was completed.
     *
     * @return string
     */
    public function getTimeCompleted(): string
    {
        return $this->time_completed;
    }

    /**
     * The original batch header as provided by the payment sender.
     *
     * @param \PayPal\Api\PayoutSenderBatchHeader $sender_batch_header
     *
     * @return $this
     */
    public function setSenderBatchHeader($sender_batch_header): self
    {
        $this->sender_batch_header = $sender_batch_header;
        return $this;
    }

    /**
     * The sender-provided batch payout header.
     *
     * @return \PayPal\Api\PayoutSenderBatchHeader
     */
    public function getSenderBatchHeader(): PayoutSenderBatchHeader
    {
        return $this->sender_batch_header;
    }

    /**
     * Total amount, in U.S. dollars, requested for the applicable payouts.
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
     * Total amount, in U.S. dollars, requested for the applicable payouts.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

    /**
     * Total estimate in U.S. dollars for the applicable payouts fees.
     *
     * @param \PayPal\Api\Currency $fees
     *
     * @return $this
     */
    public function setFees($fees): self
    {
        $this->fees = $fees;
        return $this;
    }

    /**
     * Total estimate in U.S. dollars for the applicable payouts fees.
     *
     * @return \PayPal\Api\Currency
     */
    public function getFees(): Currency
    {
        return $this->fees;
    }

    /**
     * Sets Errors
     *
     * @param \PayPal\Api\Error $errors
     *
     * @return $this
     */
    public function setErrors($errors): self
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * Gets Errors
     *
     * @return \PayPal\Api\Error
     */
    public function getErrors(): Error
    {
        return $this->errors;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
     *
     * @return $this
     */
    public function setLinks($links): self
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links): ?self
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links): self
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

}
