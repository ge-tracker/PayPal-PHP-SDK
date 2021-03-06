<?php

namespace PayPal\Test\Api;

use PayPal\Api\Cost;
use PHPUnit\Framework\TestCase;

/**
 * Class Cost
 */
class CostTest extends TestCase
{
    /**
     * Gets Json String of Object Cost
     * @return string
     */
    public static function getJson()
    {
        return '{"percent":"12.34","amount":' . CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Cost
     */
    public static function getObject()
    {
        return new Cost(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Cost
     */
    public function testSerializationDeserialization()
    {
        $obj = new Cost(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPercent());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Cost $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('12.34', $obj->getPercent());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
