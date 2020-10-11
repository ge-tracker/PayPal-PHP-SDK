<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentOptions;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentOptions
 *
 * @package PayPal\Test\Api
 */
class PaymentOptionsTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentOptions
     * @return string
     */
    public static function getJson(): string
    {
        return '{"allowed_payment_method":"TestSample","recurring_flag":true,"skip_fmf":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentOptions
     */
    public static function getObject(): PaymentOptions
    {
        return new PaymentOptions(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentOptions
     */
    public function testSerializationDeserialization(): PaymentOptions
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getAllowedPaymentMethod(), "TestSample");
        self::assertEquals($obj->getRecurringFlag(), true);
        self::assertEquals($obj->getSkipFmf(), true);
    }
}
