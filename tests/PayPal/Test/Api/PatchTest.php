<?php

namespace PayPal\Test\Api;

use PayPal\Api\Patch;
use PayPal\Common\PayPalModel;
use PHPUnit\Framework\TestCase;

/**
 * Class Patch
 */
class PatchTest extends TestCase
{
    /**
     * Gets Json String of Object Patch
     * @return string
     */
    public static function getJson()
    {
        return '{"op":"TestSample","path":"TestSample","value":"TestSample","from":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Patch
     */
    public static function getObject()
    {
        return new Patch(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Patch
     */
    public function testSerializationDeserialization()
    {
        $obj = new Patch(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getOp());
        self::assertNotNull($obj->getPath());
        self::assertNotNull($obj->getValue());
        self::assertNotNull($obj->getFrom());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Patch $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getOp());
        self::assertEquals('TestSample', $obj->getPath());
        self::assertEquals('TestSample', $obj->getValue());
        self::assertEquals('TestSample', $obj->getFrom());
    }
}
