<?php

namespace PayPal\Test\Api;

use PayPal\Api\Links;
use PHPUnit\Framework\TestCase;

/**
 * Class Links
 *
 * @package PayPal\Test\Api
 */
class LinksTest extends TestCase
{
    /**
     * Gets Json String of Object Links
     * @return string
     */
    public static function getJson(): string
    {
        return '{"href":"TestSample","rel":"TestSample","targetSchema":' .HyperSchemaTest::getJson() . ',"method":"TestSample","enctype":"TestSample","schema":' .HyperSchemaTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Links
     */
    public static function getObject(): Links
    {
        return new Links(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Links
     */
    public function testSerializationDeserialization(): Links
    {
        $obj = new Links(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getHref());
        self::assertNotNull($obj->getRel());
        self::assertNotNull($obj->getTargetSchema());
        self::assertNotNull($obj->getMethod());
        self::assertNotNull($obj->getEnctype());
        self::assertNotNull($obj->getSchema());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Links $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getHref(), "TestSample");
        self::assertEquals($obj->getRel(), "TestSample");
        self::assertEquals($obj->getTargetSchema(), HyperSchemaTest::getObject());
        self::assertEquals($obj->getMethod(), "TestSample");
        self::assertEquals($obj->getEnctype(), "TestSample");
        self::assertEquals($obj->getSchema(), HyperSchemaTest::getObject());
    }
}
