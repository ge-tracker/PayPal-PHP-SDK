<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class WebhookEventList
 *
 * List of webhooks events.
 *
 *
 * @property \PayPal\Api\WebhookEvent[] events
 * @property int count
 * @property \PayPal\Api\Links[] links
 */
class WebhookEventList extends PayPalModel
{
    /**
     * A list of webhooks events.
     *
     * @param \PayPal\Api\WebhookEvent[] $events
     *
     * @return $this
     */
    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * A list of webhooks events.
     *
     * @return \PayPal\Api\WebhookEvent[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Append Events to the list.
     *
     * @param \PayPal\Api\WebhookEvent $webhookEvent
     * @return $this
     */
    public function addEvent($webhookEvent)
    {
        if (!$this->getEvents()) {
            return $this->setEvents([$webhookEvent]);
        }

        return $this->setEvents(
            array_merge($this->getEvents(), [$webhookEvent])
        );
    }

    /**
     * Remove Events from the list.
     *
     * @param \PayPal\Api\WebhookEvent $webhookEvent
     * @return $this
     */
    public function removeEvent($webhookEvent)
    {
        return $this->setEvents(
            array_diff($this->getEvents(), [$webhookEvent])
        );
    }

    /**
     * The number of items in each range of results. Note that the response might have fewer items than the requested `page_size` value.
     *
     * @param int $count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * The number of items in each range of results. Note that the response might have fewer items than the requested `page_size` value.
     *
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks([$links]);
        }

        return $this->setLinks(
            array_merge($this->getLinks(), [$links])
        );
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), [$links])
        );
    }
}
