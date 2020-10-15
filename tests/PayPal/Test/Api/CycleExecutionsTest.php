<?php

namespace PayPal\Test\Api;

use PayPal\Api\CycleExecutions;
use PHPUnit\Framework\TestCase;

/**
 * Class CycleExecutions
 */
class CycleExecutionsTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"tenure_type":"TestSample","sequence":"TestSample","cycles_completed":"TestSample","cycles_remaining":"TestSample","total_cycles":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CycleExecutions
     */
    public static function getObject()
    {
        return new CycleExecutions(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CycleExecutions
     */
    public function testSerializationDeserialization()
    {
        $obj = new CycleExecutions(self::getJson());
        self::assertNotNull($obj->getTenureType());
        self::assertNotNull($obj->getSequence());
        self::assertNotNull($obj->getCyclesCompleted());
        self::assertNotNull($obj->getCyclesRemaining());
        self::assertNotNull($obj->getTotalCycles());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param CycleExecutions $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getTenureType());
        self::assertEquals('TestSample', $obj->getSequence());
        self::assertEquals('TestSample', $obj->getCyclesCompleted());
        self::assertEquals('TestSample', $obj->getCyclesRemaining());
        self::assertEquals('TestSample', $obj->getTotalCycles());
    }
}
