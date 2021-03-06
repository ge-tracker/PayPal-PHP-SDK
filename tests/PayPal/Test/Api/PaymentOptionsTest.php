<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentOptions;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentOptions
 */
class PaymentOptionsTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentOptions
     * @return string
     */
    public static function getJson()
    {
        return '{"allowed_payment_method":"TestSample","recurring_flag":true,"skip_fmf":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentOptions
     */
    public static function getObject()
    {
        return new PaymentOptions(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentOptions
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentOptions(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAllowedPaymentMethod());
        self::assertNotNull($obj->getRecurringFlag());
        self::assertNotNull($obj->getSkipFmf());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentOptions $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getAllowedPaymentMethod());
        self::assertEquals(true, $obj->getRecurringFlag());
        self::assertEquals(true, $obj->getSkipFmf());
    }
}
