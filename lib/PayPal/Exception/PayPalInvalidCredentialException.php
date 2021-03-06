<?php

namespace PayPal\Exception;

use Exception;

/**
 * Class PayPalInvalidCredentialException
 */
class PayPalInvalidCredentialException extends Exception
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

    /**
     * prints error message
     *
     * @return string
     */
    public function errorMessage()
    {
        return 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b>';
    }
}
