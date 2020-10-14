<?php

namespace PayPal\Test\Api;

use PayPal\Api\ChargeModel;
use PHPUnit\Framework\TestCase;

/**
 * Class ChargeModel
 */
class ChargeModelTest extends TestCase
{
    /**
     * Gets Json String of Object ChargeModels
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","type":"TestSample","amount":' . CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ChargeModel
     */
    public static function getObject()
    {
        return new ChargeModel(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return ChargeModel
     */
    public function testSerializationDeserialization()
    {
        $obj = new ChargeModel(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ChargeModel $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getType());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
