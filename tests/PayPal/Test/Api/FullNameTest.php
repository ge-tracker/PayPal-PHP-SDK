<?php

namespace PayPal\Test\Api;

use PayPal\Api\FullName;

use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class FullName
 */
class FullNameTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"full_name":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return FullName
     */
    public static function getObject()
    {
        return new FullName(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return FullName
     */
    public function testSerializationDeserialization()
    {
        $obj = new FullName(self::getJson());
        self::assertNotNull($obj->getFullName());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param FullName $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getFullName());
    }
}
