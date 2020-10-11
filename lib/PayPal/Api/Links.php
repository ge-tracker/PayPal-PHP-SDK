<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Links
 *
 *
 *
 * @package PayPal\Api
 *
 * @property string href
 * @property string rel
 * @property \PayPal\Api\HyperSchema targetSchema
 * @property string method
 * @property string enctype
 * @property \PayPal\Api\HyperSchema schema
 */
class Links extends PayPalModel
{
    /**
     * Sets Href
     *
     * @param string $href
     *
     * @return $this
     */
    public function setHref($href): self
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Gets Href
     *
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * Sets Rel
     *
     * @param string $rel
     *
     * @return $this
     */
    public function setRel($rel): self
    {
        $this->rel = $rel;
        return $this;
    }

    /**
     * Gets Rel
     *
     * @return string
     */
    public function getRel(): string
    {
        return $this->rel;
    }

    /**
     * Sets TargetSchema
     *
     * @param \PayPal\Api\HyperSchema $targetSchema
     *
     * @return $this
     */
    public function setTargetSchema($targetSchema): self
    {
        $this->targetSchema = $targetSchema;
        return $this;
    }

    /**
     * Gets TargetSchema
     *
     * @return \PayPal\Api\HyperSchema
     */
    public function getTargetSchema(): HyperSchema
    {
        return $this->targetSchema;
    }

    /**
     * Sets Method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Gets Method
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Sets Enctype
     *
     * @param string $enctype
     *
     * @return $this
     */
    public function setEnctype($enctype): self
    {
        $this->enctype = $enctype;
        return $this;
    }

    /**
     * Gets Enctype
     *
     * @return string
     */
    public function getEnctype(): string
    {
        return $this->enctype;
    }

    /**
     * Sets Schema
     *
     * @param \PayPal\Api\HyperSchema $schema
     *
     * @return $this
     */
    public function setSchema($schema): self
    {
        $this->schema = $schema;
        return $this;
    }

    /**
     * Gets Schema
     *
     * @return \PayPal\Api\HyperSchema
     */
    public function getSchema(): HyperSchema
    {
        return $this->schema;
    }

}
