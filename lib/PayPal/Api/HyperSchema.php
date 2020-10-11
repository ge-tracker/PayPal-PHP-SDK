<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class HyperSchema
 *
 *
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\Links[] links
 * @property string fragmentResolution
 * @property bool readonly
 * @property string contentEncoding
 * @property string pathStart
 * @property string mediaType
 */
class HyperSchema extends PayPalModel
{
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

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links): ?self
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links): self
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

    /**
     * Sets FragmentResolution
     *
     * @param string $fragmentResolution
     *
     * @return $this
     */
    public function setFragmentResolution($fragmentResolution): self
    {
        $this->fragmentResolution = $fragmentResolution;
        return $this;
    }

    /**
     * Gets FragmentResolution
     *
     * @return string
     */
    public function getFragmentResolution(): string
    {
        return $this->fragmentResolution;
    }

    /**
     * Sets Readonly
     *
     * @param bool $readonly
     *
     * @return $this
     */
    public function setReadonly($readonly): self
    {
        $this->readonly = $readonly;
        return $this;
    }

    /**
     * Gets Readonly
     *
     * @return bool
     */
    public function getReadonly(): bool
    {
        return $this->readonly;
    }

    /**
     * Sets ContentEncoding
     *
     * @param string $contentEncoding
     *
     * @return $this
     */
    public function setContentEncoding($contentEncoding): self
    {
        $this->contentEncoding = $contentEncoding;
        return $this;
    }

    /**
     * Gets ContentEncoding
     *
     * @return string
     */
    public function getContentEncoding(): string
    {
        return $this->contentEncoding;
    }

    /**
     * Sets PathStart
     *
     * @param string $pathStart
     *
     * @return $this
     */
    public function setPathStart($pathStart): self
    {
        $this->pathStart = $pathStart;
        return $this;
    }

    /**
     * Gets PathStart
     *
     * @return string
     */
    public function getPathStart(): string
    {
        return $this->pathStart;
    }

    /**
     * Sets MediaType
     *
     * @param string $mediaType
     *
     * @return $this
     */
    public function setMediaType($mediaType): self
    {
        $this->mediaType = $mediaType;
        return $this;
    }

    /**
     * Gets MediaType
     *
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

}
