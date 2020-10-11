<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class Measurement
 *
 * Measurement to represent item dimensions like length, width, height and weight etc.
 *
 * @package PayPal\Api
 *
 * @property string value
 * @property string unit
 */
class Measurement extends PayPalModel
{
    /**
     * Value this measurement represents.
     *
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Value this measurement represents.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Unit in which the value is represented.
     *
     * @param string $unit
     *
     * @return $this
     */
    public function setUnit($unit): self
    {
        $this->unit = $unit;
        return $this;
    }

    /**
     * Unit in which the value is represented.
     *
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

}
