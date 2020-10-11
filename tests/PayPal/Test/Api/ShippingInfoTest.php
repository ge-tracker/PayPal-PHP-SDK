<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingInfo
 *
 * @package PayPal\Test\Api
 */
class ShippingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingInfo
     * @return string
     */
    public static function getJson(): string
    {
        return '{"first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ShippingInfo
     */
    public static function getObject(): ShippingInfo
    {
        return new ShippingInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ShippingInfo
     */
    public function testSerializationDeserialization(): ShippingInfo
    {
        $obj = new ShippingInfo(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getBusinessName());
        self::assertNotNull($obj->getAddress());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingInfo $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getBusinessName(), "TestSample");
        self::assertEquals($obj->getAddress(), AddressTest::getObject());
    }
}
