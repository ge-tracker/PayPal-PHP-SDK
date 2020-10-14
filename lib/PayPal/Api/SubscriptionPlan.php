<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class Plan
 *
 * Billing plan resource that will be used to create a billing agreement.
 *
 *
 * @property string                         id
 * @property string                         product_id
 * @property string                         name
 * @property string                         status
 * @property string                         description
 * @property string                         usage_type
 * @property bool                           quantity_supported
 * @property string                         create_time
 * @property string                         update_time
 * @property \PayPal\Api\BillingCycles[]    billing_cycles
 * @property \PayPal\Api\PaymentPreferences payment_preferences
 */
class SubscriptionPlan extends PayPalResourceModel
{
    /**
     * Identifier of the billing plan. 128 characters max.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Identifier of the billing plan. 128 characters max.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Identifier of the related product. 128 characters max.
     *
     * @param string $product_id
     *
     * @return $this
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Identifier of the related product. 128 characters max.
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Name of the billing plan. 128 characters max.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Name of the billing plan. 128 characters max.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Description of the billing plan. 128 characters max.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Description of the billing plan. 128 characters max.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Usage type of the billing plan. 128 characters max.
     *
     * @param string $usage_type
     *
     * @return $this
     */
    public function setUsageType($usage_type)
    {
        $this->usage_type = $usage_type;

        return $this;
    }

    /**
     * Usage type of the billing plan. 128 characters max.
     *
     * @return string
     */
    public function getUsageType()
    {
        return $this->usage_type;
    }

    /**
     * Quantity supported for the billing plan. 128 characters max.
     *
     * @param bool $quantity_supported
     *
     * @return $this
     */
    public function setQuantitySupported($quantity_supported)
    {
        $this->quantity_supported = $quantity_supported;

        return $this;
    }

    /**
     * Quantity supported for the billing plan. 128 characters max.
     *
     * @return string
     */
    public function getQuantitySupported()
    {
        return $this->quantity_supported;
    }

    /**
     * Status of the billing plan. Allowed values: `CREATED`, `ACTIVE`, `INACTIVE`, and `DELETED`.
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Status of the billing plan. Allowed values: `CREATED`, `ACTIVE`, `INACTIVE`, and `DELETED`.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Time when the billing plan was created. Format YYYY-MM-DDTimeTimezone, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }

    /**
     * Time when the billing plan was created. Format YYYY-MM-DDTimeTimezone, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Time when this billing plan was updated. Format YYYY-MM-DDTimeTimezone, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time)
    {
        $this->update_time = $update_time;

        return $this;
    }

    /**
     * Time when this billing plan was updated. Format YYYY-MM-DDTimeTimezone, as defined in [ISO8601](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    /**
     * Array of payment definitions for this billing plan.
     *
     * @param \PayPal\Api\BillingCycles[] $billing_cycles
     *
     * @return $this
     */
    public function setBillingCycles($billing_cycles)
    {
        $this->billing_cycles = $billing_cycles;

        return $this;
    }

    /**
     * Array of payment definitions for this billing plan.
     *
     * @return \PayPal\Api\BillingCycles[]
     */
    public function getBillingCycles()
    {
        return $this->billing_cycles;
    }

    /**
     * Array of payment definitions for this billing plan.
     *
     * @param \PayPal\Api\PaymentPreferences $payment_preferences
     *
     * @return $this
     */
    public function setPaymentPreferences($payment_preferences)
    {
        $this->payment_preferences = $payment_preferences;

        return $this;
    }

    /**
     * Array of payment definitions for this billing plan.
     *
     * @return \PayPal\Api\PaymentPreferences
     */
    public function getPaymentPreferences()
    {
        return $this->payment_preferences;
    }

    /**
     * Retrieve the details for a particular billing plan by passing the billing plan ID to the request URI.
     *
     * @param string         $planId
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return self
     */
    public static function get($planId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($planId, 'planId');
        $payLoad = '';
        $json = self::executeCall(
            "/v1/billing/plans/$planId",
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
     * Create a new billing plan by passing the details for the plan, including the plan name, description, and type, to the request URI.
     *
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return self
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            '/v1/billing/plans/',
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
     * Replace specific fields within a billing plan by passing the ID of the billing plan to the request URI. In addition, pass a patch object in the request JSON that specifies the operation to perform, field to update, and new value for each update.
     *
     * @param PatchRequest   $patchRequest
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return bool
     */
    public function update($patchRequest, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($this->getId(), 'Id');
        ArgumentValidator::validate($patchRequest, 'patchRequest');
        $payLoad = $patchRequest->toJSON();
        self::executeCall(
            "/v1/billing/plans/{$this->getId()}",
            'PATCH',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );

        return true;
    }

    /**
     * Delete a billing plan by passing the ID of the billing plan to the request URI.
     *
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
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
     * List billing plans according to optional query string parameters specified.
     *
     * @param array          $params
     * @param ApiContext     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return \PayPal\Api\SubscriptionPlanList
     */
    public static function all($params, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($params, 'params');
        $payLoad = '';
        $allowedParams = [
            'page_size'      => 1,
            'status'         => 1,
            'page'           => 1,
            'total_required' => 1,
        ];
        $json = self::executeCall(
            '/v1/billing/plans/' . '?' . http_build_query(array_intersect_key($params, $allowedParams)),
            'GET',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new SubscriptionPlanList();
        $ret->fromJson($json);

        return $ret;
    }
}
