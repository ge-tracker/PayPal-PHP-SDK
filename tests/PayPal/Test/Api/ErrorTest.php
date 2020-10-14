<?php

namespace PayPal\Test\Api;

use PayPal\Api\Error;
use PHPUnit\Framework\TestCase;

/**
 * Class Error
 */
class ErrorTest extends TestCase
{
    /**
     * Gets Json String of Object Error
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"name":"TestSample","purchase_unit_reference_id":"TestSample","message":"TestSample","code":"TestSample","details":' . ErrorDetailsTest::getJson() . ',"processor_response":' . ProcessorResponseTest::getJson() . ',"fmf_details":' . FmfDetailsTest::getJson() . ',"information_link":"TestSample","debug_id":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Error
     */
    public static function getObject()
    {
        return new Error(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Error
     */
    public function testSerializationDeserialization()
    {
        $obj = new Error(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getPurchaseUnitReferenceId());
        self::assertNotNull($obj->getMessage());
        self::assertNotNull($obj->getCode());
        self::assertNotNull($obj->getDetails());
        self::assertNotNull($obj->getProcessorResponse());
        self::assertNotNull($obj->getFmfDetails());
        self::assertNotNull($obj->getInformationLink());
        self::assertNotNull($obj->getDebugId());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Error $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getPurchaseUnitReferenceId());
        self::assertEquals('TestSample', $obj->getMessage());
        self::assertEquals('TestSample', $obj->getCode());
        self::assertEquals($obj->getDetails(), ErrorDetailsTest::getObject());
        self::assertEquals($obj->getProcessorResponse(), ProcessorResponseTest::getObject());
        self::assertEquals($obj->getFmfDetails(), FmfDetailsTest::getObject());
        self::assertEquals('TestSample', $obj->getInformationLink());
        self::assertEquals('TestSample', $obj->getDebugId());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
