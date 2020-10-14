<?php

namespace PayPal\Test\Api;

use PayPal\Api\Currency;
use PHPUnit\Framework\TestCase;

/**
 * Class Currency
 *
 * @package PayPal\Test\Api
 */
class CurrencyTest extends TestCase
{
    /**
     * Gets Json String of Object Currency
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"currency":"TestSample","value":"12.34"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Currency
     */
    public static function getObject()
    {
        return new Currency(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Currency
     */
    public function testSerializationDeserialization()
    {
        $obj = new Currency(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCurrency());
        self::assertNotNull($obj->getValue());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Currency $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getCurrency());
        self::assertEquals("12.34", $obj->getValue());
    }
}
