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
    public static function getJson(): string
    {
        return '{"country_code":"TestSample","national_number":"TestSample","extension":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Phone
     */
    public static function getObject(): Phone
    {
        return new Phone(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Phone
     */
    public function testSerializationDeserialization(): Phone
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getCountryCode(), "TestSample");
        self::assertEquals($obj->getNationalNumber(), "TestSample");
        self::assertEquals($obj->getExtension(), "TestSample");
    }
}
