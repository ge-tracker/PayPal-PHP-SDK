<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class InvoiceAddress
 */
class InvoiceAddressTest extends TestCase
{
    /**
     * Gets Json String of Object Address
     * @return string
     */
    public static function getJson()
    {
        return '{"line1":"TestSample","line2":"TestSample","city":"TestSample","country_code":"TestSample","postal_code":"TestSample","state":"TestSample","phone":' . PhoneTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceAddress
     */
    public static function getObject()
    {
        return new InvoiceAddress(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceAddress
     */
    public function testSerializationDeserialization()
    {
        $obj = new InvoiceAddress(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getLine1());
        self::assertNotNull($obj->getLine2());
        self::assertNotNull($obj->getCity());
        self::assertNotNull($obj->getCountryCode());
        self::assertNotNull($obj->getPostalCode());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getPhone());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceAddress $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getLine1());
        self::assertEquals('TestSample', $obj->getLine2());
        self::assertEquals('TestSample', $obj->getCity());
        self::assertEquals('TestSample', $obj->getCountryCode());
        self::assertEquals('TestSample', $obj->getPostalCode());
        self::assertEquals('TestSample', $obj->getState());
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
    }
}
