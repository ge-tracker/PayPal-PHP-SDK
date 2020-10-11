<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PayoutBatch
 *
 * The PayPal-generated batch status.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\PayoutBatchHeader batch_header
 * @property \PayPal\Api\PayoutItemDetails[] items
 * @property \PayPal\Api\Links[] links
 */
class PayoutBatch extends PayPalModel
{
    /**
     * A batch header. Includes the generated batch status.
     *
     * @param \PayPal\Api\PayoutBatchHeader $batch_header
     *
     * @return $this
     */
    public function setBatchHeader($batch_header): self
    {
        $this->batch_header = $batch_header;
        return $this;
    }

    /**
     * A batch header. Includes the generated batch status.
     *
     * @return \PayPal\Api\PayoutBatchHeader
     */
    public function getBatchHeader(): PayoutBatchHeader
    {
        return $this->batch_header;
    }

    /**
     * An array of items in a batch payout.
     *
     * @param \PayPal\Api\PayoutItemDetails[] $items
     *
     * @return $this
     */
    public function setItems($items): self
    {
        $this->items = $items;
        return $this;
    }

    /**
     * An array of items in a batch payout.
     *
     * @return \PayPal\Api\PayoutItemDetails[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Append Items to the list.
     *
     * @param \PayPal\Api\PayoutItemDetails $payoutItemDetails
     * @return $this
     */
    public function addItem($payoutItemDetails): ?self
    {
        if (!$this->getItems()) {
            return $this->setItems(array($payoutItemDetails));
        } else {
            return $this->setItems(
                array_merge($this->getItems(), array($payoutItemDetails))
            );
        }
    }

    /**
     * Remove Items from the list.
     *
     * @param \PayPal\Api\PayoutItemDetails $payoutItemDetails
     * @return $this
     */
    public function removeItem($payoutItemDetails): self
    {
        return $this->setItems(
            array_diff($this->getItems(), array($payoutItemDetails))
        );
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

}
