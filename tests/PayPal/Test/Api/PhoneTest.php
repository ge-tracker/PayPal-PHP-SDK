<?php

namespace PayPal\Test\Api;

use PayPal\Api\Phone;
use PHPUnit\Framework\TestCase;

/**
 * Class Phone
 *
 * @package PayPal\Test\Api
 */
class PhoneTest extends TestCase
{
    /**
     * Gets Json String of Object Phone
     * @return string
     */
    public static function getJson()
    {
        return '{"country_code":"TestSample","national_number":"TestSample","extension":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Phone
     */
    public static function getObject()
    {
        return new Phone(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Phone
     */
    public function testSerializationDeserialization()
    {
        $obj = new Phone(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCountryCode());
        self::assertNotNull($obj->getNationalNumber());
        self::assertNotNull($obj->getExtension());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Phone $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getCountryCode());
        self::assertEquals("TestSample", $obj->getNationalNumber());
        self::assertEquals("TestSample", $obj->getExtension());
    }
}
