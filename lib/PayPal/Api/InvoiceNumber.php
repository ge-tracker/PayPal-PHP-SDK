<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class InvoiceNumber
 *
 * The next invoice number
 *
 * @package PayPal\Api
 *
 * @property string number
 */
class InvoiceNumber extends PayPalModel
{
    /**
     * The next invoice number.
     *
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * The next invoice number.
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}
