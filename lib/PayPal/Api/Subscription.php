<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Subscription
 *
 * Subscription details.
 *
 * @property string                              id
 * @property string                              plan_id
 * @property string                              start_time
 * @property int                             quantity
 * @property \PayPal\Api\CurrencyRest            shipping_amount
 * @property \PayPal\Api\Subscriber              subscriber
 * @property \PayPal\Api\SubscriptionBillingInfo billing_info
 * @property string                              create_time
 * @property string                              update_time
 * @property string                              status
 * @property string                              status_update_time
 */
class Subscription extends PayPalResourceModel
{
    /**
     * @param string $id
     *
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $plan_id
     *
     * @return self
     */
    public function setPlanId($plan_id): self
    {
        $this->plan_id = $plan_id;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlanId()
    {
        return $this->plan_id;
    }

    /**
     * @param string $start_time
     *
     * @return self
     */
    public function setStartTime($start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * @param int $quantity
     *
     * @return self
     */
    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param \PayPal\Api\CurrencyRest $shipping_amount
     *
     * @return self
     */
    public function setShippingAmount($shipping_amount): self
    {
        $this->shipping_amount = $shipping_amount;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getShippingAmount()
    {
        return $this->shipping_amount;
    }

    /**
     * @param \PayPal\Api\Subscriber $subscriber
     *
     * @return self
     */
    public function setSubscriber($subscriber): self
    {
        $this->subscriber = $subscriber;

        return $this;
    }

    /**
     * @return \PayPal\Api\Subscriber
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }

    /**
     * @param \PayPal\Api\SubscriptionBillingInfo $billing_info
     *
     * @return self
     */
    public function setBillingInfo($billing_info): self
    {
        $this->billing_info = $billing_info;

        return $this;
    }

    /**
     * @return \PayPal\Api\SubscriptionBillingInfo
     */
    public function getBillingInfo()
    {
        return $this->billing_info;
    }

    /**
     * @param string $create_time
     *
     * @return self
     */
    public function setCreateTime($create_time): self
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * @param string $update_time
     *
     * @return self
     */
    public function setUpdateTime($update_time): self
    {
        $this->update_time = $update_time;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * @param string $status
     *
     * @return self
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status_update_time
     *
     * @return self
     */
    public function setStatusUpdateTime($status_update_time): self
    {
        $this->status_update_time = $status_update_time;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusUpdateTime()
    {
        return $this->status_update_time;
    }

    /**
     * Retrieve the details for a particular subscription by passing the subscription ID to the request URI.
     *
     * @param string              $subscriptionId
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return self
     */
    public static function get($subscriptionId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($subscriptionId, 'subscriptionId');
        $payLoad = '';
        $json = self::executeCall(
            "/v1/billing/subscriptions/$subscriptionId",
            'GET',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new self();
        $ret->fromJson($json);

        return $ret;
    }

    /**
     * Create a new subscription by passing the details for the plan, including the plan name, description, and type, to the request URI.
     *
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return self
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            '/v1/billing/subscriptions/',
            'POST',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);

        return $this;
    }

    /**
     * Replace specific fields within a subscription by passing the ID of the subscription to the request URI. In addition, pass a patch object in the request JSON that specifies the operation to perform, field to update, and new value for each update.
     *
     * @param PatchRequest        $patchRequest
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return bool
     */
    public function update($patchRequest, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');
        ArgumentValidator::validate($patchRequest, 'patchRequest');
        $payLoad = $patchRequest->toJSON();
        self::executeCall(
            "/v1/billing/subscriptions/{$this->getId()}",
            'PATCH',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );

        return true;
    }

    /**
     * Activate a subscription
     *
     * @param array               $params
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return bool
     */
    public function activate($params = [], $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');

        $allowedParams = [
            'reason' => 1,
        ];

        self::executeCall(
            '/v1/billing/subscriptions/' . $this->getId() . '/activate',
            'POST',
            self::buildJsonPayload($params, $allowedParams),
            null,
            $apiContext,
            $restCall
        );

        return true;
    }

    /**
     * Suspend a subscription
     *
     * @param array               $params
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return bool
     */
    public function suspend(array $params = [], $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');

        $allowedParams = [
            'reason' => 1,
        ];

        self::executeCall(
            '/v1/billing/subscriptions/' . $this->getId() . '/suspend',
            'POST',
            self::buildJsonPayload($params, $allowedParams),
            null,
            $apiContext,
            $restCall
        );

        return true;
    }

    /**
     * Cancel a subscription
     *
     * @param array               $params
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return bool
     */
    public function cancel(array $params = [], $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');

        $allowedParams = [
            'reason' => 1,
        ];

        self::executeCall(
            '/v1/billing/subscriptions/' . $this->getId() . '/cancel',
            'POST',
            self::buildJsonPayload($params, $allowedParams),
            null,
            $apiContext,
            $restCall
        );

        return true;
    }

    /**
     * Delete a subscription by passing the ID of the subscription to the request URI.
     *
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return bool
     */
    public function delete($apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');
        $patchRequest = new PatchRequest();
        $patch = new Patch();
        $value = new PayPalModel('{
            "state":"DELETED"
        }');
        $patch->setOp('replace')
            ->setPath('/')
            ->setValue($value);
        $patchRequest->addPatch($patch);

        return $this->update($patchRequest, $apiContext, $restCall);
    }

    /**
     * List transactions for subscription
     *
     * @param string              $startTime
     * @param string              $endTime
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return \PayPal\Api\SubscriptionList
     */
    public function transactions(string $startTime, string $endTime, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');

        $allowedParams = ['start_time' => 1, 'end_time' => 1];
        $params = ['start_time' => $startTime, 'end_time' => $endTime];

        $json = self::executeCall(
            self::buildUrl('/v1/billing/subscriptions/' . $this->getId() . '/transactions', $params, $allowedParams),
            'GET',
            '',
            null,
            $apiContext,
            $restCall
        );

        $ret = new SubscriptionList();
        $ret->fromJson($json);

        return $ret;
    }
}
