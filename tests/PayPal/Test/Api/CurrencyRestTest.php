<?php

namespace PayPal\Test\Api;

use PayPal\Api\CurrencyRest;
use PHPUnit\Framework\TestCase;

/**
 * Class Currency
 */
class CurrencyRestTest extends TestCase
{
    /**
     * Gets Json String of Object Currency
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"currency_code":"TestSample","value":"12.34"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CurrencyRest
     */
    public static function getObject()
    {
        return new CurrencyRest(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CurrencyRest
     */
    public function testSerializationDeserialization()
    {
        $obj = new CurrencyRest(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCurrency());
        self::assertNotNull($obj->getValue());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param CurrencyRest $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getCurrency());
        self::assertEquals('12.34', $obj->getValue());
    }
}
