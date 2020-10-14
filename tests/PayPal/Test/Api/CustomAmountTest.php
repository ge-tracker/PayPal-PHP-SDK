<?php

namespace PayPal\Test\Api;

use PayPal\Api\CustomAmount;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomAmount
 */
class CustomAmountTest extends TestCase
{
    /**
     * Gets Json String of Object CustomAmount
     * @return string
     */
    public static function getJson()
    {
        return '{"label":"TestSample","amount":' . CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CustomAmount
     */
    public static function getObject()
    {
        return new CustomAmount(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return CustomAmount
     */
    public function testSerializationDeserialization()
    {
        $obj = new CustomAmount(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getLabel());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CustomAmount $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getLabel());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
