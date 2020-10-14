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
    public static function getJson()
    {
        return '{"href":"TestSample","rel":"TestSample","targetSchema":' .HyperSchemaTest::getJson() . ',"method":"TestSample","enctype":"TestSample","schema":' .HyperSchemaTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Links
     */
    public static function getObject()
    {
        return new Links(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Links
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getHref());
        self::assertEquals("TestSample", $obj->getRel());
        self::assertEquals($obj->getTargetSchema(), HyperSchemaTest::getObject());
        self::assertEquals("TestSample", $obj->getMethod());
        self::assertEquals("TestSample", $obj->getEnctype());
        self::assertEquals($obj->getSchema(), HyperSchemaTest::getObject());
    }
}
