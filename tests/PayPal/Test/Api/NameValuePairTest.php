<?php

namespace PayPal\Test\Api;

use PayPal\Api\NameValuePair;
use PHPUnit\Framework\TestCase;

/**
 * Class NameValuePair
 */
class NameValuePairTest extends TestCase
{
    /**
     * Gets Json String of Object NameValuePair
     * @return string
     */
    public static function getJson()
    {
        return '{"name":"TestSample","value":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return NameValuePair
     */
    public static function getObject()
    {
        return new NameValuePair(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return NameValuePair
     */
    public function testSerializationDeserialization()
    {
        $obj = new NameValuePair(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getValue());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param NameValuePair $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getValue());
    }
}
