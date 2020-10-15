<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriptionAddress;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionAddress
 */
class SubscriptionAddressTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"address_line_1":"TestSample","address_line_2":"TestSample","admin_area_1":"TestSample","admin_area_2":"TestSample","postal_code":"TestSample","country_code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriptionAddress
     */
    public static function getObject()
    {
        return new SubscriptionAddress(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriptionAddress
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriptionAddress(self::getJson());
        self::assertNotNull($obj->getAddressLine1());
        self::assertNotNull($obj->getAddressLine2());
        self::assertNotNull($obj->getAdminArea1());
        self::assertNotNull($obj->getAdminArea2());
        self::assertNotNull($obj->getPostalCode());
        self::assertNotNull($obj->getCountryCode());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriptionAddress $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getAddressLine1());
        self::assertEquals('TestSample', $obj->getAddressLine2());
        self::assertEquals('TestSample', $obj->getAdminArea1());
        self::assertEquals('TestSample', $obj->getAdminArea2());
        self::assertEquals('TestSample', $obj->getPostalCode());
        self::assertEquals('TestSample', $obj->getCountryCode());
    }
}
