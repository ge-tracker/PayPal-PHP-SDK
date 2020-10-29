<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class CatalogProduct
 *
 * A Catalog Product is goods or services sold.
 *
 * @property string id
 * @property string name
 * @property string description
 * @property string type
 * @property string category
 * @property string image_url
 * @property string home_url
 * @property string create_time
 * @property string update_time
 */
class CatalogProduct extends PayPalResourceModel
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
     * @param string $name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $type
     *
     * @return self
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $category
     *
     * @return self
     */
    public function setCategory($category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $image_url
     *
     * @return self
     */
    public function setImageUrl($image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @param string $home_url
     *
     * @return self
     */
    public function setHomeUrl($home_url): self
    {
        $this->home_url = $home_url;

        return $this;
    }

    /**
     * @return string
     */
    public function getHomeUrl()
    {
        return $this->home_url;
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
     * Retrieve the details for a particular product by passing the product ID to the request URI.
     *
     * @param string              $productId
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return self
     */
    public static function get($productId, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($productId, 'productId');
        $payLoad = '';
        $json = self::executeCall(
            "/v1/catalogs/products/$productId",
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
     * Create a new product by passing the details for the product, including the id, name, and type, to the request URI.
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
            '/v1/catalogs/products/',
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
     * Replace specific fields within a product by passing the ID of the product to the request URI. In addition, pass a patch object in the request JSON that specifies the operation to perform, field to update, and new value for each update.
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
            "/v1/catalogs/products/{$this->getId()}",
            'PATCH',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );

        return true;
    }

    /**
     * List products according to optional query string parameters specified.
     *
     * @param array               $params
     * @param ApiContext|null     $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall|null $restCall   is the Rest Call Service that is used to make rest calls
     *
     * @return \PayPal\Api\CatalogProductList
     */
    public static function all($params, $apiContext = null, $restCall = null)
    {
        ArgumentValidator::validate($params, 'params');
        $payLoad = '';
        $allowedParams = [
            'page_size'      => 1,
            'page'           => 1,
            'total_required' => 1,
        ];
        $json = self::executeCall(
            '/v1/catalogs/products/' . '?' . http_build_query(array_intersect_key($params, $allowedParams)),
            'GET',
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new CatalogProductList();
        $ret->fromJson($json);

        return $ret;
    }
}
