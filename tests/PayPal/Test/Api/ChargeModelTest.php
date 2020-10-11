<?php

namespace PayPal\Test\Api;

use PayPal\Api\ChargeModel;
use PHPUnit\Framework\TestCase;

/**
 * Class ChargeModel
 *
 * @package PayPal\Test\Api
 */
class ChargeModelTest extends TestCase
{
    /**
     * Gets Json String of Object ChargeModels
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","type":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ChargeModel
     */
    public static function getObject(): ChargeModel
    {
        return new ChargeModel(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ChargeModel
     */
    public function testSerializationDeserialization(): ChargeModel
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
