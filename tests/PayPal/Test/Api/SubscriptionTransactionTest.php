<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriptionTransaction;
use PayPal\Test\Api\AmountWithBreakdownTest;
use PayPal\Test\Api\SubscriberNameTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionTransaction
 */
class SubscriptionTransactionTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","status":"TestSample","payer_email":"TestSample","payer_name":' . SubscriberNameTest::getJson() . ',"amount_with_breakdown":' . AmountWithBreakdownTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriptionTransaction
     */
    public static function getObject()
    {
        return new SubscriptionTransaction(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriptionTransaction
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriptionTransaction(self::getJson());
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getPayerEmail());
        self::assertNotNull($obj->getPayerName());
        self::assertNotNull($obj->getAmountWithBreakdown());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriptionTransaction $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getStatus());
        self::assertEquals('TestSample', $obj->getPayerEmail());
        self::assertEquals($obj->getPayerName(), SubscriberNameTest::getObject());
        self::assertEquals($obj->getAmountWithBreakdown(), AmountWithBreakdownTest::getObject());
    }
}
