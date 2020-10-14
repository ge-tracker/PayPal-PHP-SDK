<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Frequency
 *
 * @property int                      version
 * @property \PayPal\Api\CurrencyRest fixed_price
 * @property string                   create_time
 * @property string                   update_time
 */
class PricingScheme extends PayPalModel
{
    /**
     * @param int $version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param \PayPal\Api\CurrencyRest $fixed_price
     *
     * @return $this
     */
    public function setFixedPrice($fixed_price)
    {
        $this->fixed_price = $fixed_price;

        return $this;
    }

    /**
     * @return \PayPal\Api\CurrencyRest
     */
    public function getFixedPrice()
    {
        return $this->fixed_price;
    }

    /**
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
     * @return string
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
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
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }
}
