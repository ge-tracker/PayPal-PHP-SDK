<?php
namespace PayPal\Test\Api;

use PayPal\Api\Address;
use PHPUnit\Framework\TestCase;

/**
 * Class Address
 *
 * @package PayPal\Test\Api
 */
class AddressTest extends TestCase
{
    /**
     * Gets Json String of Object Address
     * @return string
     */
    public static function getJson(): string
    {
        return '{"line1":"TestSample","line2":"TestSample","city":"TestSample","country_code":"TestSample","postal_code":"TestSample","state":"TestSample","phone":"TestSample","normalization_status":"TestSample","status":"TestSample","type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Address
     */
    public static function getObject(): Address
    {
        return new Address(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Address
     */
    public function testSerializationDeserialization(): Address
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getLine1(), "TestSample");
        self::assertEquals($obj->getLine2(), "TestSample");
        self::assertEquals($obj->getCity(), "TestSample");
        self::assertEquals($obj->getCountryCode(), "TestSample");
        self::assertEquals($obj->getPostalCode(), "TestSample");
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getPhone(), "TestSample");
        self::assertEquals($obj->getNormalizationStatus(), "TestSample");
        self::assertEquals($obj->getStatus(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
    }
}
