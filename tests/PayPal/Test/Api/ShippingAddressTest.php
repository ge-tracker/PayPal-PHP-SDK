<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingAddress
 */
class ShippingAddressTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingAddress
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","recipient_name":"TestSample","default_address":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ShippingAddress
     */
    public static function getObject()
    {
        return new ShippingAddress(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return ShippingAddress
     */
    public function testSerializationDeserialization()
    {
        $obj = new ShippingAddress(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getRecipientName());
        self::assertNotNull($obj->getDefaultAddress());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingAddress $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getRecipientName());
        self::assertEquals(true, $obj->getDefaultAddress());
    }
}
