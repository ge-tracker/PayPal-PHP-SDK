<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriptionList;
use PayPal\Test\Api\SubscriptionTransactionTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionList
 */
class SubscriptionListTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"transactions":' . SubscriptionTransactionTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriptionList
     */
    public static function getObject()
    {
        return new SubscriptionList(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriptionList
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriptionList(self::getJson());
        self::assertNotNull($obj->getTransactions());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriptionList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getTransactions(), SubscriptionTransactionTest::getObject());
    }
}
