<?php

namespace PayPal\Test\Api;

use PayPal\Api\FmfDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class FmfDetails
 *
 * @package PayPal\Test\Api
 */
class FmfDetailsTest extends TestCase
{
    /**
     * Gets Json String of Object FmfDetails
     * @return string
     */
    public static function getJson(): string
    {
        return '{"filter_type":"TestSample","filter_id":"TestSample","name":"TestSample","description":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FmfDetails
     */
    public static function getObject(): FmfDetails
    {
        return new FmfDetails(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FmfDetails
     */
    public function testSerializationDeserialization(): FmfDetails
    {
        $obj = new FmfDetails(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getFilterType());
        self::assertNotNull($obj->getFilterId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FmfDetails $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getFilterType(), "TestSample");
        self::assertEquals($obj->getFilterId(), "TestSample");
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getDescription(), "TestSample");
    }
}
