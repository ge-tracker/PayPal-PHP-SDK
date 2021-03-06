<?php

namespace PayPal\Test\Api;

use PayPal\Api\OverrideChargeModel;
use PHPUnit\Framework\TestCase;

/**
 * Class OverrideChargeModel
 */
class OverrideChargeModelTest extends TestCase
{
    /**
     * Gets Json String of Object OverrideChargeModel
     * @return string
     */
    public static function getJson()
    {
        return '{"charge_id":"TestSample","amount":' . CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return OverrideChargeModel
     */
    public static function getObject()
    {
        return new OverrideChargeModel(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return OverrideChargeModel
     */
    public function testSerializationDeserialization()
    {
        $obj = new OverrideChargeModel(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getChargeId());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param OverrideChargeModel $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getChargeId());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
