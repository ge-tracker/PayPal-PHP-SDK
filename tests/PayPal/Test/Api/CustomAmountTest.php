<?php

namespace PayPal\Test\Api;

use PayPal\Api\CustomAmount;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomAmount
 *
 * @package PayPal\Test\Api
 */
class CustomAmountTest extends TestCase
{
    /**
     * Gets Json String of Object CustomAmount
     * @return string
     */
    public static function getJson(): string
    {
        return '{"label":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CustomAmount
     */
    public static function getObject(): CustomAmount
    {
        return new CustomAmount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CustomAmount
     */
    public function testSerializationDeserialization(): CustomAmount
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getLabel(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
