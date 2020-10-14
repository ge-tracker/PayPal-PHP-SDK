<?php

namespace PayPal\Test\Api;

use PayPal\Api\ErrorDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ErrorDetails
 */
class ErrorDetailsTest extends TestCase
{
    /**
     * Gets Json String of Object ErrorDetails
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"field":"TestSample","issue":"TestSample","purchase_unit_reference_id":"TestSample","code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return ErrorDetails
     */
    public static function getObject()
    {
        return new ErrorDetails(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return ErrorDetails
     */
    public function testSerializationDeserialization()
    {
        $obj = new ErrorDetails(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getField());
        self::assertNotNull($obj->getIssue());
        self::assertNotNull($obj->getPurchaseUnitReferenceId());
        self::assertNotNull($obj->getCode());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ErrorDetails $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getField());
        self::assertEquals('TestSample', $obj->getIssue());
        self::assertEquals('TestSample', $obj->getPurchaseUnitReferenceId());
        self::assertEquals('TestSample', $obj->getCode());
    }
}
