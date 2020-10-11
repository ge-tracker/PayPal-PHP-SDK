<?php

namespace PayPal\Test\Api;

use PayPal\Api\Notification;
use PHPUnit\Framework\TestCase;

/**
 * Class Notification
 *
 * @package PayPal\Test\Api
 */
class NotificationTest extends TestCase
{
    /**
     * Gets Json String of Object Notification
     * @return string
     */
    public static function getJson(): string
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Notification
     */
    public static function getObject(): Notification
    {
        return new Notification(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Notification
     */
    public function testSerializationDeserialization(): Notification
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getSubject(), "TestSample");
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getSendToMerchant(), true);
    }
}
