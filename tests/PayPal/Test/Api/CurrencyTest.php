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
    public static function getJson(): string
    {
        return '{"currency":"TestSample","value":"12.34"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Currency
     */
    public static function getObject(): Currency
    {
        return new Currency(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Currency
     */
    public function testSerializationDeserialization(): Currency
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getCurrency(), "TestSample");
        self::assertEquals($obj->getValue(), "12.34");
    }
}
