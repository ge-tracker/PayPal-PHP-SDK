<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingCost;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingCost
 *
 * @package PayPal\Test\Api
 */
class ShippingCostTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingCost
     * @return string
     */
    public static function getJson(): string
    {
        return '{"amount":' .CurrencyTest::getJson() . ',"tax":' .TaxTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ShippingCost
     */
    public static function getObject(): ShippingCost
    {
        return new ShippingCost(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ShippingCost
     */
    public function testSerializationDeserialization(): ShippingCost
    {
        $obj = new ShippingCost(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getTax());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingCost $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getTax(), TaxTest::getObject());
    }
}
