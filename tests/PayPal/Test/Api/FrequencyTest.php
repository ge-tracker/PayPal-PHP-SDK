<?php

namespace PayPal\Test\Api;

use PayPal\Api\Frequency;
use PHPUnit\Framework\TestCase;

/**
 * Class Frequency
 */
class FrequencyTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"interval_unit":"TestSample","interval_count":1}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Frequency
     */
    public static function getObject()
    {
        return new Frequency(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Frequency
     */
    public function testSerializationDeserialization()
    {
        $obj = new Frequency(self::getJson());

        self::assertNotNull($obj);
        self::assertNotNull($obj->getIntervalUnit());
        self::assertNotNull($obj->getIntervalCount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param Frequency $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getIntervalUnit());
        self::assertEquals(1, $obj->getIntervalCount());
    }
}
