<?php

namespace PayPal\Test\Api;

use PayPal\Api\Address;
use PHPUnit\Framework\TestCase;

/**
 * Class Address
 */
class AddressTest extends TestCase
{
    /**
     * Gets Json String of Object Address
     * @return string
     */
    public static function getJson()
    {
        return '{"line1":"TestSample","line2":"TestSample","city":"TestSample","country_code":"TestSample","postal_code":"TestSample","state":"TestSample","phone":"TestSample","normalization_status":"TestSample","status":"TestSample","type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Address
     */
    public static function getObject()
    {
        return new Address(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Address
     */
    public function testSerializationDeserialization()
    {
        $obj = new Address(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getLine1());
        self::assertNotNull($obj->getLine2());
        self::assertNotNull($obj->getCity());
        self::assertNotNull($obj->getCountryCode());
        self::assertNotNull($obj->getPostalCode());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getPhone());
        self::assertNotNull($obj->getNormalizationStatus());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getType());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Address $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getLine1());
        self::assertEquals('TestSample', $obj->getLine2());
        self::assertEquals('TestSample', $obj->getCity());
        self::assertEquals('TestSample', $obj->getCountryCode());
        self::assertEquals('TestSample', $obj->getPostalCode());
        self::assertEquals('TestSample', $obj->getState());
        self::assertEquals('TestSample', $obj->getPhone());
        self::assertEquals('TestSample', $obj->getNormalizationStatus());
        self::assertEquals('TestSample', $obj->getStatus());
        self::assertEquals('TestSample', $obj->getType());
    }
}
