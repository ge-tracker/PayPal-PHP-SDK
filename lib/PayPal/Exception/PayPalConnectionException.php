<?php

namespace PayPal\Exception;

/**
 * Class PayPalConnectionException
 *
 * @package PayPal\Exception
 */
class PayPalConnectionException extends \Exception
{
    /**
     * The url that was being connected to when the exception occured
     *
     * @var string
     */
    private $url;

    /**
     * Any response data that was returned by the server
     *
     * @var string
     */
    private $data;

    /**
     * Default Constructor
     *
     * @param string $url
     * @param string    $message
     * @param int    $code
     */
    public function __construct($url, $message, $code = 0)
    {
        parent::__construct($message, $code);
        $this->url = $url;
    }

    /**
     * Sets Data
     *
     * @param $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * Gets Data
     *
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * Gets Url
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
