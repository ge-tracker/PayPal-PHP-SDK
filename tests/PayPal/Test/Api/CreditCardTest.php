<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreditCard;
use PHPUnit\Framework\TestCase;

/**
 * Class CreditCard
 *
 * @package PayPal\Test\Api
 */
class CreditCardTest extends TestCase
{
    /**
     * Gets Json String of Object CreditCard
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","number":"TestSample","type":"TestSample","expire_month":123,"expire_year":123,"cvv2":"TestSample","first_name":"TestSample","last_name":"TestSample","billing_address":' . AddressTest::getJson() . ',"external_customer_id":"TestSample","state":"TestSample","valid_until":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditCard
     */
    public static function getObject(): CreditCard
    {
        return new CreditCard(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CreditCard
     */
    public function testSerializationDeserialization(): CreditCard
    {
        $obj = new CreditCard(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getNumber());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getExpireMonth());
        self::assertNotNull($obj->getExpireYear());
        self::assertNotNull($obj->getCvv2());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getBillingAddress());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getValidUntil());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCard $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getNumber(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getExpireMonth(), 123);
        self::assertEquals($obj->getExpireYear(), 123);
        self::assertEquals($obj->getCvv2(), "TestSample");
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        self::assertEquals($obj->getExternalCustomerId(), "TestSample");
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getValidUntil(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
