<?php

namespace PayPal\Test\Api;

use PayPal\Api\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class Image
 *
 * @package PayPal\Test\Api
 */
class ImageTest extends TestCase
{
    /**
     * Gets Json String of Object Patch
     * @return string
     */
    public static function getJson(): string
    {
        return '{"image":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Image
     */
    public static function getObject(): Image
    {
        return new Image(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Image
     */
    public function testSerializationDeserialization(): Image
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getImage(), "TestSample");
    }
}
