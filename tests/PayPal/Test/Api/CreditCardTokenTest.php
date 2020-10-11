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
    public static function getJson(): string
    {
        return '{"credit_card_id":"TestSample","payer_id":"TestSample","last4":"TestSample","type":"TestSample","expire_month":123,"expire_year":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CreditCardToken
     */
    public static function getObject(): CreditCardToken
    {
        return new CreditCardToken(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CreditCardToken
     */
    public function testSerializationDeserialization(): CreditCardToken
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getCreditCardId(), "TestSample");
        self::assertEquals($obj->getPayerId(), "TestSample");
        self::assertEquals($obj->getLast4(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getExpireMonth(), 123);
        self::assertEquals($obj->getExpireYear(), 123);
    }
}
