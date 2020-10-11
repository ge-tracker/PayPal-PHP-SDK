<?php

namespace PayPal\Test\Api;

use PayPal\Api\CancelNotification;
use PHPUnit\Framework\TestCase;

/**
 * Class CancelNotification
 *
 * @package PayPal\Test\Api
 */
class CancelNotificationTest extends TestCase
{
    /**
     * Gets Json String of Object CancelNotification
     * @return string
     */
    public static function getJson(): string
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true,"send_to_payer":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CancelNotification
     */
    public static function getObject(): CancelNotification
    {
        return new CancelNotification(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CancelNotification
     */
    public function testSerializationDeserialization(): CancelNotification
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getSubject(), "TestSample");
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getSendToMerchant(), true);
        self::assertEquals($obj->getSendToPayer(), true);
    }
}
