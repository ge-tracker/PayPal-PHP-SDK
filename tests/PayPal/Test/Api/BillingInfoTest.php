<?php

namespace PayPal\Test\Api;

use PayPal\Api\BillingInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class BillingInfo
 */
class BillingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object BillingInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' . InvoiceAddressTest::getJson() . ',"language":"TestSample","additional_info":"TestSample","notification_channel":"TestSample","phone":' . PhoneTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BillingInfo
     */
    public static function getObject()
    {
        return new BillingInfo(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return BillingInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new BillingInfo(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getBusinessName());
        self::assertNotNull($obj->getAddress());
        self::assertNotNull($obj->getLanguage());
        self::assertNotNull($obj->getAdditionalInfo());
        self::assertNotNull($obj->getNotificationChannel());
        self::assertNotNull($obj->getPhone());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BillingInfo $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getEmail());
        self::assertEquals('TestSample', $obj->getFirstName());
        self::assertEquals('TestSample', $obj->getLastName());
        self::assertEquals('TestSample', $obj->getBusinessName());
        self::assertEquals($obj->getAddress(), InvoiceAddressTest::getObject());
        self::assertEquals('TestSample', $obj->getLanguage());
        self::assertEquals('TestSample', $obj->getAdditionalInfo());
        self::assertEquals('TestSample', $obj->getNotificationChannel());
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
    }
}
