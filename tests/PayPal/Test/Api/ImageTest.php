<?php

namespace PayPal\Test\Api;

use PayPal\Api\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class Image
 */
class ImageTest extends TestCase
{
    /**
     * Gets Json String of Object Patch
     * @return string
     */
    public static function getJson()
    {
        return '{"image":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Image
     */
    public static function getObject()
    {
        return new Image(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Image
     */
    public function testSerializationDeserialization()
    {
        $obj = new Image(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getImage());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Image $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getImage());
    }
}
