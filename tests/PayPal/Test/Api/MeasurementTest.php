<?php

namespace PayPal\Test\Api;

use PayPal\Api\Measurement;
use PHPUnit\Framework\TestCase;

/**
 * Class Measurement
 *
 * @package PayPal\Test\Api
 */
class MeasurementTest extends TestCase
{
    /**
     * Gets Json String of Object Measurement
     * @return string
     */
    public static function getJson()
    {
        return '{"value":"TestSample","unit":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Measurement
     */
    public static function getObject()
    {
        return new Measurement(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Measurement
     */
    public function testSerializationDeserialization()
    {
        $obj = new Measurement(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getValue());
        self::assertNotNull($obj->getUnit());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Measurement $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getValue());
        self::assertEquals("TestSample", $obj->getUnit());
    }
}
