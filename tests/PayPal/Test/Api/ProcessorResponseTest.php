<?php

namespace PayPal\Test\Api;

use PayPal\Api\ProcessorResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class ProcessorResponse
 *
 * @package PayPal\Test\Api
 */
class ProcessorResponseTest extends TestCase
{
    /**
     * Gets Json String of Object ProcessorResponse
     * @return string
     */
    public static function getJson()
    {
        return '{"response_code":"TestSample","avs_code":"TestSample","cvv_code":"TestSample","advice_code":"TestSample","eci_submitted":"TestSample","vpas":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ProcessorResponse
     */
    public static function getObject()
    {
        return new ProcessorResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ProcessorResponse
     */
    public function testSerializationDeserialization()
    {
        $obj = new ProcessorResponse(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getResponseCode());
        self::assertNotNull($obj->getAvsCode());
        self::assertNotNull($obj->getCvvCode());
        self::assertNotNull($obj->getAdviceCode());
        self::assertNotNull($obj->getEciSubmitted());
        self::assertNotNull($obj->getVpas());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ProcessorResponse $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getResponseCode());
        self::assertEquals("TestSample", $obj->getAvsCode());
        self::assertEquals("TestSample", $obj->getCvvCode());
        self::assertEquals("TestSample", $obj->getAdviceCode());
        self::assertEquals("TestSample", $obj->getEciSubmitted());
        self::assertEquals("TestSample", $obj->getVpas());
    }
}
