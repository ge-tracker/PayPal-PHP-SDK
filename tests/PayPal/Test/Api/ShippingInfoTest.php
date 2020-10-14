<?php

namespace PayPal\Test\Api;

use PayPal\Api\BaseAddress;
use PayPal\Api\ShippingInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingInfo
 */
class ShippingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' . AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ShippingInfo
     */
    public static function getObject()
    {
        return new ShippingInfo(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return ShippingInfo
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getFirstName());
        self::assertEquals('TestSample', $obj->getLastName());
        self::assertEquals('TestSample', $obj->getBusinessName());
        self::assertInstanceOf(BaseAddress::class, AddressTest::getObject());
    }
}
