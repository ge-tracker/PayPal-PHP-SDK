<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Frequency
 *
 * @property string interval_unit
 * @property int    interval_count
 */
class Frequency extends PayPalModel
{
    public function setIntervalUnit($interval_unit)
    {
        $this->interval_unit = $interval_unit;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntervalUnit()
    {
        return $this->interval_unit;
    }

    /**
     * @param int $interval_count
     *
     * @return $this
     */
    public function setIntervalCount($interval_count)
    {
        $this->interval_count = $interval_count;

        return $this;
    }

    /**
     * @return int
     */
    public function getIntervalCount()
    {
        return $this->interval_count;
    }
}
