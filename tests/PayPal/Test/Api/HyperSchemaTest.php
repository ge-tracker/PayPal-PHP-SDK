<?php

namespace PayPal\Test\Api;

use PayPal\Api\HyperSchema;
use PHPUnit\Framework\TestCase;

/**
 * Class HyperSchema
 *
 * @package PayPal\Test\Api
 */
class HyperSchemaTest extends TestCase
{
    /**
     * Gets Json String of Object HyperSchema
     * @return string
     */
    public static function getJson(): string
    {
        return '{"fragmentResolution":"TestSample","readonly":true,"contentEncoding":"TestSample","pathStart":"TestSample","mediaType":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return HyperSchema
     */
    public static function getObject(): HyperSchema
    {
        return new HyperSchema(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return HyperSchema
     */
    public function testSerializationDeserialization(): HyperSchema
    {
        $obj = new HyperSchema(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getLinks());
        self::assertNotNull($obj->getFragmentResolution());
        self::assertNotNull($obj->getReadonly());
        self::assertNotNull($obj->getContentEncoding());
        self::assertNotNull($obj->getPathStart());
        self::assertNotNull($obj->getMediaType());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param HyperSchema $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
        self::assertEquals($obj->getFragmentResolution(), "TestSample");
        self::assertEquals($obj->getReadonly(), true);
        self::assertEquals($obj->getContentEncoding(), "TestSample");
        self::assertEquals($obj->getPathStart(), "TestSample");
        self::assertEquals($obj->getMediaType(), "TestSample");
    }
}
