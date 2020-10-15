<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriberName;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriberName
 */
class SubscriberNameTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"given_name":"TestSample","surname":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriberName
     */
    public static function getObject()
    {
        return new SubscriberName(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriberName
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriberName(self::getJson());
        self::assertNotNull($obj->getGivenName());
        self::assertNotNull($obj->getSurname());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriberName $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getGivenName());
        self::assertEquals('TestSample', $obj->getSurname());
    }
}
