<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentSummary;
use PayPal\Common\PayPalModel;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentSummary
 */
class PaymentSummaryTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentSummary
     * @return string
     */
    public static function getJson()
    {
        return '{"paypal":' . CurrencyTest::getJson() . ',"other":' . CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentSummary
     */
    public static function getObject()
    {
        return new PaymentSummary(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentSummary
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentSummary(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPaypal());
        self::assertNotNull($obj->getOther());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentSummary $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getPaypal(), CurrencyTest::getObject());
        self::assertEquals($obj->getOther(), CurrencyTest::getObject());
    }
}
