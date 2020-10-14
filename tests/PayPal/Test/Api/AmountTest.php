<?php

namespace PayPal\Test\Api;

use PayPal\Api\Amount;
use PHPUnit\Framework\TestCase;

/**
 * Class Amount
 *
 * @package PayPal\Test\Api
 */
class AmountTest extends TestCase
{
    /**
     * Gets Json String of Object Amount
     * @return string
     */
    public static function getJson()
    {
        return '{"currency":"TestSample","total":"12.34","details":' . DetailsTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Amount
     */
    public static function getObject()
    {
        return new Amount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Amount
     */
    public function testSerializationDeserialization()
    {
        $obj = new Amount(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCurrency());
        self::assertNotNull($obj->getTotal());
        self::assertNotNull($obj->getDetails());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Amount $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getCurrency());
        self::assertEquals("12.34", $obj->getTotal());
        self::assertEquals($obj->getDetails(), DetailsTest::getObject());
    }
}
