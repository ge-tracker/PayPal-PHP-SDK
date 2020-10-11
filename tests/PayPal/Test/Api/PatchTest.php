<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\Patch;
use PHPUnit\Framework\TestCase;

/**
 * Class Patch
 *
 * @package PayPal\Test\Api
 */
class PatchTest extends TestCase
{
    /**
     * Gets Json String of Object Patch
     * @return string
     */
    public static function getJson(): string
    {
        return '{"op":"TestSample","path":"TestSample","value":"TestSample","from":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Patch
     */
    public static function getObject(): Patch
    {
        return new Patch(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Patch
     */
    public function testSerializationDeserialization(): Patch
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getOp(), "TestSample");
        self::assertEquals($obj->getPath(), "TestSample");
        self::assertEquals($obj->getValue(), "TestSample");
        self::assertEquals($obj->getFrom(), "TestSample");
    }


}
