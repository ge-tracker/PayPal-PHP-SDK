<?php
use PayPal\Exception\PayPalConnectionException;
use PHPUnit\Framework\TestCase;

/**
 * Test class for PayPalConnectionException.
 *
 */
class PayPalConnectionExceptionTest extends TestCase
{
    /**
     * @var PayPalConnectionException
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->object = new PayPalConnectionException('http://testURL', 'test message');
        $this->object->setData('response payload for connection');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function teatDown(): void
    {
    }

    /**
     */
    public function testGetUrl()
    {
        self::assertEquals('http://testURL', $this->object->getUrl());
    }

    /**
     */
    public function testGetData()
    {
        self::assertEquals('response payload for connection', $this->object->getData());
    }
}
