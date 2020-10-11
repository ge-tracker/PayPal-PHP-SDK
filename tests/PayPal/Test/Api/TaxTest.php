<?php

namespace PayPal\Test\Api;

use PayPal\Api\Tax;
use PHPUnit\Framework\TestCase;

/**
 * Class Tax
 *
 * @package PayPal\Test\Api
 */
class TaxTest extends TestCase
{
    /**
     * Gets Json String of Object Tax
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","name":"TestSample","percent":"12.34","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Tax
     */
    public static function getObject(): Tax
    {
        return new Tax(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Tax
     */
    public function testSerializationDeserialization(): Tax
    {
        $obj = new Tax(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getPercent());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Tax $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getPercent(), "12.34");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
