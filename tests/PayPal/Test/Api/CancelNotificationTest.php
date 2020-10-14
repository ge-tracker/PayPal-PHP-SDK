<?php

namespace PayPal\Test\Api;

use PayPal\Api\CancelNotification;
use PHPUnit\Framework\TestCase;

/**
 * Class CancelNotification
 */
class CancelNotificationTest extends TestCase
{
    /**
     * Gets Json String of Object CancelNotification
     * @return string
     */
    public static function getJson()
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true,"send_to_payer":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CancelNotification
     */
    public static function getObject()
    {
        return new CancelNotification(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return CancelNotification
     */
    public function testSerializationDeserialization()
    {
        $obj = new CancelNotification(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSubject());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getSendToMerchant());
        self::assertNotNull($obj->getSendToPayer());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CancelNotification $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getSubject());
        self::assertEquals('TestSample', $obj->getNote());
        self::assertEquals(true, $obj->getSendToMerchant());
        self::assertEquals(true, $obj->getSendToPayer());
    }
}
