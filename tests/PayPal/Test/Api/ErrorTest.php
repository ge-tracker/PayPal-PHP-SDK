<?php

namespace PayPal\Test\Api;

use PayPal\Api\Error;
use PHPUnit\Framework\TestCase;

/**
 * Class Error
 *
 * @package PayPal\Test\Api
 */
class ErrorTest extends TestCase
{
    /**
     * Gets Json String of Object Error
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{"name":"TestSample","purchase_unit_reference_id":"TestSample","message":"TestSample","code":"TestSample","details":' . ErrorDetailsTest::getJson() . ',"processor_response":' . ProcessorResponseTest::getJson() . ',"fmf_details":' . FmfDetailsTest::getJson() . ',"information_link":"TestSample","debug_id":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Error
     */
    public static function getObject(): Error
    {
        return new Error(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Error
     */
    public function testSerializationDeserialization(): Error
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getPurchaseUnitReferenceId(), "TestSample");
        self::assertEquals($obj->getMessage(), "TestSample");
        self::assertEquals($obj->getCode(), "TestSample");
        self::assertEquals($obj->getDetails(), ErrorDetailsTest::getObject());
        self::assertEquals($obj->getProcessorResponse(), ProcessorResponseTest::getObject());
        self::assertEquals($obj->getFmfDetails(), FmfDetailsTest::getObject());
        self::assertEquals($obj->getInformationLink(), "TestSample");
        self::assertEquals($obj->getDebugId(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
