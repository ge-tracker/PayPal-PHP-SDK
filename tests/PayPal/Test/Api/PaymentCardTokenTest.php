<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentCardToken;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentCardToken
 *
 * @package PayPal\Test\Api
 */
class PaymentCardTokenTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentCardToken
     * @return string
     */
    public static function getJson()
    {
        return '{"payment_card_id":"TestSample","external_customer_id":"TestSample","last4":"TestSample","type":"TestSample","expire_month":123,"expire_year":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentCardToken
     */
    public static function getObject()
    {
        return new PaymentCardToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentCardToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentCardToken(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPaymentCardId());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getLast4());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getExpireMonth());
        self::assertNotNull($obj->getExpireYear());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCardToken $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getPaymentCardId());
        self::assertEquals("TestSample", $obj->getExternalCustomerId());
        self::assertEquals("TestSample", $obj->getLast4());
        self::assertEquals("TestSample", $obj->getType());
        self::assertEquals(123, $obj->getExpireMonth());
        self::assertEquals(123, $obj->getExpireYear());
    }
}
