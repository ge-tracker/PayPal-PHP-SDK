<?php

namespace PayPal\Test\Api;

use PayPal\Api\AmountWithBreakdown;
use PayPal\Test\Api\CurrencyRestTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class AmountWithBreakdown
 */
class AmountWithBreakdownTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"gross_amount":' . CurrencyRestTest::getJson() . ',"fee_amount":' . CurrencyRestTest::getJson() . ',"net_amount":' . CurrencyRestTest::getJson() . ',"time":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return AmountWithBreakdown
     */
    public static function getObject()
    {
        return new AmountWithBreakdown(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return AmountWithBreakdown
     */
    public function testSerializationDeserialization()
    {
        $obj = new AmountWithBreakdown(self::getJson());
        self::assertNotNull($obj->getGrossAmount());
        self::assertNotNull($obj->getFeeAmount());
        self::assertNotNull($obj->getNetAmount());
        self::assertNotNull($obj->getTime());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param AmountWithBreakdown $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getGrossAmount(), CurrencyRestTest::getObject());
        self::assertEquals($obj->getFeeAmount(), CurrencyRestTest::getObject());
        self::assertEquals($obj->getNetAmount(), CurrencyRestTest::getObject());
        self::assertEquals('TestSample', $obj->getTime());
    }
}
