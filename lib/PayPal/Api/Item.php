<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Validation\NumericValidator;
use PayPal\Validation\UrlValidator;

/**
 * Class Item
 *
 * Item details.
 *
 * @package PayPal\Api
 *
 * @property string sku
 * @property string name
 * @property string description
 * @property string quantity
 * @property string price
 * @property string currency
 * @property string tax
 * @property string url
 */
class Item extends PayPalModel
{
    /**
     * Stock keeping unit corresponding (SKU) to item.
     *
     * @param string $sku
     *
     * @return $this
     */
    public function setSku($sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Stock keeping unit corresponding (SKU) to item.
     *
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * Item name. 127 characters max.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Item name. 127 characters max.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Description of the item. Only supported when the `payment_method` is set to `paypal`.
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Description of the item. Only supported when the `payment_method` is set to `paypal`.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Number of a particular item. 10 characters max.
     *
     * @param string $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Number of a particular item. 10 characters max.
     *
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * Item cost. 10 characters max.
     *
     * @param string|double $price
     *
     * @return $this
     */
    public function setPrice($price): self
    {
        NumericValidator::validate($price, "Price");
        $price = FormatConverter::formatToPrice($price, $this->getCurrency());
        $this->price = $price;
        return $this;
    }

    /**
     * Item cost. 10 characters max.
     *
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * 3-letter [currency code](https://developer.paypal.com/docs/integration/direct/rest_api_payment_country_currency_support/).
     *
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * 3-letter [currency code](https://developer.paypal.com/docs/integration/direct/rest_api_payment_country_currency_support/).
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Tax of the item. Only supported when the `payment_method` is set to `paypal`.
     *
     * @param string|double $tax
     *
     * @return $this
     */
    public function setTax($tax): self
    {
        NumericValidator::validate($tax, "Tax");
        $tax = FormatConverter::formatToPrice($tax, $this->getCurrency());
        $this->tax = $tax;
        return $this;
    }

    /**
     * Tax of the item. Only supported when the `payment_method` is set to `paypal`.
     *
     * @return string
     */
    public function getTax(): string
    {
        return $this->tax;
    }

    /**
     * URL linking to item information. Available to payer in transaction history.
     *
     * @param string $url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setUrl($url): self
    {
        UrlValidator::validate($url, "Url");
        $this->url = $url;
        return $this;
    }

    /**
     * URL linking to item information. Available to payer in transaction history.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Category type of the item.
     * Valid Values: ["DIGITAL", "PHYSICAL"]
     * @deprecated Not publicly available
     * @param string $category
     *
     * @return $this
     */
    public function setCategory($category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Category type of the item.
     * @deprecated Not publicly available
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Weight of the item.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Measurement $weight
     *
     * @return $this
     */
    public function setWeight($weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Weight of the item.
     * @deprecated Not publicly available
     * @return \PayPal\Api\Measurement
     */
    public function getWeight(): Measurement
    {
        return $this->weight;
    }

    /**
     * Length of the item.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Measurement $length
     *
     * @return $this
     */
    public function setLength($length): self
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Length of the item.
     * @deprecated Not publicly available
     * @return \PayPal\Api\Measurement
     */
    public function getLength(): Measurement
    {
        return $this->length;
    }

    /**
     * Height of the item.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Measurement $height
     *
     * @return $this
     */
    public function setHeight($height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Height of the item.
     * @deprecated Not publicly available
     * @return \PayPal\Api\Measurement
     */
    public function getHeight(): Measurement
    {
        return $this->height;
    }

    /**
     * Width of the item.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Measurement $width
     *
     * @return $this
     */
    public function setWidth($width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Width of the item.
     * @deprecated Not publicly available
     * @return \PayPal\Api\Measurement
     */
    public function getWidth(): Measurement
    {
        return $this->width;
    }

    /**
     * Set of optional data used for PayPal risk determination.
     * @deprecated Not publicly available
     * @param \PayPal\Api\NameValuePair[] $supplementary_data
     *
     * @return $this
     */
    public function setSupplementaryData($supplementary_data): self
    {
        $this->supplementary_data = $supplementary_data;
        return $this;
    }

    /**
     * Set of optional data used for PayPal risk determination.
     * @deprecated Not publicly available
     * @return \PayPal\Api\NameValuePair[]
     */
    public function getSupplementaryData(): array
    {
        return $this->supplementary_data;
    }

    /**
     * Append SupplementaryData to the list.
     * @deprecated Not publicly available
     * @param \PayPal\Api\NameValuePair $nameValuePair
     * @return $this
     */
    public function addSupplementaryData($nameValuePair): ?self
    {
        if (!$this->getSupplementaryData()) {
            return $this->setSupplementaryData(array($nameValuePair));
        } else {
            return $this->setSupplementaryData(
                array_merge($this->getSupplementaryData(), array($nameValuePair))
            );
        }
    }

    /**
     * Remove SupplementaryData from the list.
     * @deprecated Not publicly available
     * @param \PayPal\Api\NameValuePair $nameValuePair
     * @return $this
     */
    public function removeSupplementaryData($nameValuePair): self
    {
        return $this->setSupplementaryData(
            array_diff($this->getSupplementaryData(), array($nameValuePair))
        );
    }

    /**
     * Set of optional data used for PayPal post-transaction notifications.
     * @deprecated Not publicly available
     * @param \PayPal\Api\NameValuePair[] $postback_data
     *
     * @return $this
     */
    public function setPostbackData($postback_data): self
    {
        $this->postback_data = $postback_data;
        return $this;
    }

    /**
     * Set of optional data used for PayPal post-transaction notifications.
     * @deprecated Not publicly available
     * @return \PayPal\Api\NameValuePair[]
     */
    public function getPostbackData(): array
    {
        return $this->postback_data;
    }

    /**
     * Append PostbackData to the list.
     * @deprecated Not publicly available
     * @param \PayPal\Api\NameValuePair $nameValuePair
     * @return $this
     */
    public function addPostbackData($nameValuePair): ?self
    {
        if (!$this->getPostbackData()) {
            return $this->setPostbackData(array($nameValuePair));
        } else {
            return $this->setPostbackData(
                array_merge($this->getPostbackData(), array($nameValuePair))
            );
        }
    }

    /**
     * Remove PostbackData from the list.
     * @deprecated Not publicly available
     * @param \PayPal\Api\NameValuePair $nameValuePair
     * @return $this
     */
    public function removePostbackData($nameValuePair): self
    {
        return $this->setPostbackData(
            array_diff($this->getPostbackData(), array($nameValuePair))
        );
    }

}
