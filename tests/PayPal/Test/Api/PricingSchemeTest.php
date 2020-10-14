<?php

namespace PayPal\Test\Api;

use PayPal\Api\PricingScheme;
use PHPUnit\Framework\TestCase;

/**
 * Class Frequency
 */
class PricingSchemeTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"version":1,"fixed_price":' . CurrencyRestTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return PricingScheme
     */
    public static function getObject()
    {
        return new PricingScheme(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return PricingScheme
     */
    public function testSerializationDeserialization()
    {
        $obj = new PricingScheme(self::getJson());

        self::assertNotNull($obj);
        self::assertNotNull($obj->getVersion());
        self::assertNotNull($obj->getFixedPrice());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param PricingScheme $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals(1, $obj->getVersion());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
        self::assertEquals($obj->getFixedPrice(), CurrencyRestTest::getObject());
    }
}
