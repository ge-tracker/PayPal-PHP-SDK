<?php

namespace PayPal\Test\Api;

use PayPal\Api\CarrierAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class CarrierAccount
 */
class CarrierAccountTest extends TestCase
{
    /**
     * Gets Json String of Object CarrierAccount
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","phone_number":"TestSample","external_customer_id":"TestSample","phone_source":"TestSample","country_code":' . CountryCodeTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CarrierAccount
     */
    public static function getObject()
    {
        return new CarrierAccount(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return CarrierAccount
     */
    public function testSerializationDeserialization()
    {
        $obj = new CarrierAccount(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getPhoneNumber());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getPhoneSource());
        self::assertNotNull($obj->getCountryCode());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CarrierAccount $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getPhoneNumber());
        self::assertEquals('TestSample', $obj->getExternalCustomerId());
        self::assertEquals('TestSample', $obj->getPhoneSource());
        self::assertEquals($obj->getCountryCode(), CountryCodeTest::getObject());
    }
}
