<?php

namespace PayPal\Api;

use PayPal\Api\CatalogProduct;
use PayPal\Common\PayPalModel;
use PayPal\Common\PayPalResourceModel;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Validation\ArgumentValidator;

/**
 * Class CatalogProductList
 *
 * A list of Catalog Products.
 *
 * @property int total_items
 * @property int total_pages
 * @property \PayPal\Api\CatalogProduct[] products
 */
class CatalogProductList extends PayPalResourceModel
{
    /**
     * @param int $total_items
     *
     * @return self
     */
    public function setTotalItems($total_items): self
    {
        $this->total_items = $total_items;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalItems()
    {
        return $this->total_items;
    }

    /**
     * @param int $total_pages
     *
     * @return self
     */
    public function setTotalPages($total_pages): self
    {
        $this->total_pages = $total_pages;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPages()
    {
        return $this->total_pages;
    }

    /**
     * @param \PayPal\Api\CatalogProduct[] $products
     *
     * @return self
     */
    public function setProducts($products): self
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return \PayPal\Api\CatalogProduct[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
