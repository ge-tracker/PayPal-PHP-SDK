<?php

namespace PayPal\Exception;

use Exception;

/**
 * Class PayPalConfigurationException
 */
class PayPalConfigurationException extends Exception
{
    /**
     * Default Constructor
     *
     * @param string|null $message
     * @param int  $code
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
