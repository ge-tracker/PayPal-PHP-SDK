<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\PatchRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class PatchRequest
 *
 * @package PayPal\Test\Api
 */
class PatchRequestTest extends TestCase
{
    /**
     * Gets Json String of Object PatchRequest
     * @return string
     */
    public static function getJson(): string
    {
        return '{"patches":' .PatchTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PatchRequest
     */
    public static function getObject(): PatchRequest
    {
        return new PatchRequest(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PatchRequest
     */
    public function testSerializationDeserialization(): PatchRequest
    {
        $obj = new PatchRequest(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPatches());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PatchRequest $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getPatches(), PatchTest::getObject());
    }
}
