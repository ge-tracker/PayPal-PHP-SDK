<?php

namespace PayPal\Test\Api;

use PayPal\Api\Subscriber;
use PayPal\Test\Api\SubscriptionShippingAddressTest;
use PayPal\Test\Api\SubscriberNameTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class Subscriber
 */
class SubscriberTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"shipping_address":' . SubscriptionShippingAddressTest::getJson() . ',"name":' . SubscriberNameTest::getJson() . ',"email_address":"TestSample","payer_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Subscriber
     */
    public static function getObject()
    {
        return new Subscriber(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Subscriber
     */
    public function testSerializationDeserialization()
    {
        $obj = new Subscriber(self::getJson());
        self::assertNotNull($obj->getShippingAddress());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getEmailAddress());
        self::assertNotNull($obj->getPayerId());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param Subscriber $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getShippingAddress(), SubscriptionShippingAddressTest::getObject());
        self::assertEquals($obj->getName(), SubscriberNameTest::getObject());
        self::assertEquals('TestSample', $obj->getEmailAddress());
        self::assertEquals('TestSample', $obj->getPayerId());
    }
}
