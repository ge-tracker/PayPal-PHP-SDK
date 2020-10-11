<?php

namespace PayPal\Test\Api;

use PayPal\Api\ErrorDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class ErrorDetails
 *
 * @package PayPal\Test\Api
 */
class ErrorDetailsTest extends TestCase
{
    /**
     * Gets Json String of Object ErrorDetails
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{"field":"TestSample","issue":"TestSample","purchase_unit_reference_id":"TestSample","code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return ErrorDetails
     */
    public static function getObject(): ErrorDetails
    {
        return new ErrorDetails(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return ErrorDetails
     */
    public function testSerializationDeserialization(): ErrorDetails
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getField(), "TestSample");
        self::assertEquals($obj->getIssue(), "TestSample");
        self::assertEquals($obj->getPurchaseUnitReferenceId(), "TestSample");
        self::assertEquals($obj->getCode(), "TestSample");
    }
}
