<?php

namespace PayPal\Test\Api;

use PayPal\Api\LastPayment;
use PayPal\Test\Api\CurrencyRestTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class LastPayment
 */
class LastPaymentTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"amount":' . CurrencyRestTest::getJson() . ',"time":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return LastPayment
     */
    public static function getObject()
    {
        return new LastPayment(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return LastPayment
     */
    public function testSerializationDeserialization()
    {
        $obj = new LastPayment(self::getJson());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getTime());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param LastPayment $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getAmount(), CurrencyRestTest::getObject());
        self::assertEquals('TestSample', $obj->getTime());
    }
}
