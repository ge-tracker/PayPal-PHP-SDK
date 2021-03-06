<?php

namespace PayPal\Test\Api;

use PayPal\Api\CountryCode;
use PHPUnit\Framework\TestCase;

/**
 * Class CountryCode
 */
class CountryCodeTest extends TestCase
{
    /**
     * Gets Json String of Object CountryCode
     * @return string
     */
    public static function getJson()
    {
        return '{"country_code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CountryCode
     */
    public static function getObject()
    {
        return new CountryCode(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return CountryCode
     */
    public function testSerializationDeserialization()
    {
        $obj = new CountryCode(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCountryCode());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CountryCode $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getCountryCode());
    }
}
