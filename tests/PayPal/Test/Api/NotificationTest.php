<?php

namespace PayPal\Test\Api;

use PayPal\Api\Notification;
use PHPUnit\Framework\TestCase;

/**
 * Class Notification
 */
class NotificationTest extends TestCase
{
    /**
     * Gets Json String of Object Notification
     * @return string
     */
    public static function getJson()
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Notification
     */
    public static function getObject()
    {
        return new Notification(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Notification
     */
    public function testSerializationDeserialization()
    {
        $obj = new Notification(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSubject());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getSendToMerchant());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Notification $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getSubject());
        self::assertEquals('TestSample', $obj->getNote());
        self::assertEquals(true, $obj->getSendToMerchant());
    }
}
