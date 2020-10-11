<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class InvoiceAddress
 *
 * @package PayPal\Test\Api
 */
class InvoiceAddressTest extends TestCase
{
    /**
     * Gets Json String of Object Address
     * @return string
     */
    public static function getJson(): string
    {
        return '{"line1":"TestSample","line2":"TestSample","city":"TestSample","country_code":"TestSample","postal_code":"TestSample","state":"TestSample","phone":'. PhoneTest::getJson() . "}";
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceAddress
     */
    public static function getObject(): InvoiceAddress
    {
        return new InvoiceAddress(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceAddress
     */
    public function testSerializationDeserialization(): InvoiceAddress
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getLine1(), "TestSample");
        self::assertEquals($obj->getLine2(), "TestSample");
        self::assertEquals($obj->getCity(), "TestSample");
        self::assertEquals($obj->getCountryCode(), "TestSample");
        self::assertEquals($obj->getPostalCode(), "TestSample");
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
    }
}
