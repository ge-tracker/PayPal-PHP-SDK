<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreditCardToken;
use PHPUnit\Framework\TestCase;

/**
 * Class CreditCardToken
 *
 * @package PayPal\Test\Api
 */
class CreditCardTokenTest extends TestCase
{
    /**
     * Gets Json String of Object CreditCardToken
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"credit_card_id":"TestSample","payer_id":"TestSample","last4":"TestSample","type":"TestSample","expire_month":123,"expire_year":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CreditCardToken
     */
    public static function getObject()
    {
        return new CreditCardToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CreditCardToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new CreditCardToken(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCreditCardId());
        self::assertNotNull($obj->getPayerId());
        self::assertNotNull($obj->getLast4());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getExpireMonth());
        self::assertNotNull($obj->getExpireYear());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardToken $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getCreditCardId());
        self::assertEquals("TestSample", $obj->getPayerId());
        self::assertEquals("TestSample", $obj->getLast4());
        self::assertEquals("TestSample", $obj->getType());
        self::assertEquals(123, $obj->getExpireMonth());
        self::assertEquals(123, $obj->getExpireYear());
    }
}
