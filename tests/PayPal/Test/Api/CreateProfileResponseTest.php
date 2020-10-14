<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreateProfileResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class CreateProfileResponse
 *
 * @package PayPal\Test\Api
 */
class CreateProfileResponseTest extends TestCase
{
    /**
     * Gets Json String of Object CreateProfileResponse
     * @return string
     */
    public static function getJson()
    {
        return json_encode(json_decode('{"id":"TestSample"}'));
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreateProfileResponse
     */
    public static function getObject()
    {
        return new CreateProfileResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreateProfileResponse
     */
    public function testSerializationDeserialization()
    {
        $obj = new CreateProfileResponse(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreateProfileResponse $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
    }
}
