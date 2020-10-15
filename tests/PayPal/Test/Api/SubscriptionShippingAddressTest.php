<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriptionShippingAddress;
use PayPal\Test\Api\FullNameTest;
use PayPal\Test\Api\SubscriptionAddressTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionShippingAddress
 */
class SubscriptionShippingAddressTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"name":' . FullNameTest::getJson() . ',"address":' . SubscriptionAddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriptionShippingAddress
     */
    public static function getObject()
    {
        return new SubscriptionShippingAddress(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriptionShippingAddress
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriptionShippingAddress(self::getJson());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getAddress());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriptionShippingAddress $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getName(), FullNameTest::getObject());
        self::assertEquals($obj->getAddress(), SubscriptionAddressTest::getObject());
    }
}
