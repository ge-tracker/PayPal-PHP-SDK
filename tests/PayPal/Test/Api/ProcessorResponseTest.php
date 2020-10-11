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
    public static function getJson(): string
    {
        return '{"response_code":"TestSample","avs_code":"TestSample","cvv_code":"TestSample","advice_code":"TestSample","eci_submitted":"TestSample","vpas":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ProcessorResponse
     */
    public static function getObject(): ProcessorResponse
    {
        return new ProcessorResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ProcessorResponse
     */
    public function testSerializationDeserialization(): ProcessorResponse
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getResponseCode(), "TestSample");
        self::assertEquals($obj->getAvsCode(), "TestSample");
        self::assertEquals($obj->getCvvCode(), "TestSample");
        self::assertEquals($obj->getAdviceCode(), "TestSample");
        self::assertEquals($obj->getEciSubmitted(), "TestSample");
        self::assertEquals($obj->getVpas(), "TestSample");
    }
}
