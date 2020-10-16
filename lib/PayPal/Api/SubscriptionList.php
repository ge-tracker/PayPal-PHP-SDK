<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;

/**
 * Class SubscriptionList
 *
 * List of transactions linked to a payment related to a subscription.
 *
 * @property \PayPal\Api\SubscriptionTransaction[] transactions
 */
class SubscriptionList extends PayPalResourceModel
{
    /**
     * @param \PayPal\Api\SubscriptionTransaction[] $transactions
     *
     * @return self
     */
    public function setTransactions($transactions): self
    {
        $this->transactions = $transactions;

        return $this;
    }

    /**
     * @return \PayPal\Api\SubscriptionTransaction[]
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}
