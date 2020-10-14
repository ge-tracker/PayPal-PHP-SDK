<?php

namespace PayPal\Test\Api;

use PayPal\Api\AlternatePayment;
use PHPUnit\Framework\TestCase;

/**
 * Class AlternatePayment
 *
 * @package PayPal\Test\Api
 */
class AlternatePaymentTest extends TestCase
{
    /**
     * Gets Json String of Object AlternatePayment
     * @return string
     */
    public static function getJson()
    {
        return '{"alternate_payment_account_id":"TestSample","external_customer_id":"TestSample","alternate_payment_provider_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return AlternatePayment
     */
    public static function getObject()
    {
        return new AlternatePayment(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return AlternatePayment
     */
    public function testSerializationDeserialization()
    {
        $obj = new AlternatePayment(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAlternatePaymentAccountId());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getAlternatePaymentProviderId());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AlternatePayment $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getAlternatePaymentAccountId());
        self::assertEquals("TestSample", $obj->getExternalCustomerId());
        self::assertEquals("TestSample", $obj->getAlternatePaymentProviderId());
    }
}
