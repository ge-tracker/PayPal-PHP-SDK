<?php

namespace PayPal\Test\Api;

use PayPal\Api\CountryCode;
use PHPUnit\Framework\TestCase;

/**
 * Class CountryCode
 *
 * @package PayPal\Test\Api
 */
class CountryCodeTest extends TestCase
{
    /**
     * Gets Json String of Object CountryCode
     * @return string
     */
    public static function getJson(): string
    {
        return '{"country_code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CountryCode
     */
    public static function getObject(): CountryCode
    {
        return new CountryCode(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CountryCode
     */
    public function testSerializationDeserialization(): CountryCode
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getCountryCode(), "TestSample");
    }
}
