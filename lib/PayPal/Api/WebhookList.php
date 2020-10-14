<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class WebhookList
 *
 * List of webhooks.
 *
 *
 * @property \PayPal\Api\Webhook[] webhooks
 */
class WebhookList extends PayPalModel
{
    /**
     * A list of webhooks.
     *
     * @param \PayPal\Api\Webhook[] $webhooks
     *
     * @return $this
     */
    public function setWebhooks($webhooks)
    {
        $this->webhooks = $webhooks;

        return $this;
    }

    /**
     * A list of webhooks.
     *
     * @return \PayPal\Api\Webhook[]
     */
    public function getWebhooks()
    {
        return $this->webhooks;
    }

    /**
     * Append Webhooks to the list.
     *
     * @param \PayPal\Api\Webhook $webhook
     * @return $this
     */
    public function addWebhook($webhook)
    {
        if (!$this->getWebhooks()) {
            return $this->setWebhooks([$webhook]);
        }

        return $this->setWebhooks(
            array_merge($this->getWebhooks(), [$webhook])
        );
    }

    /**
     * Remove Webhooks from the list.
     *
     * @param \PayPal\Api\Webhook $webhook
     * @return $this
     */
    public function removeWebhook($webhook)
    {
        return $this->setWebhooks(
            array_diff($this->getWebhooks(), [$webhook])
        );
    }
}
