<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentHistory;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentHistory
 */
class PaymentHistoryTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentHistory
     * @return string
     */
    public static function getJson()
    {
        return '{"payments":' . PaymentTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentHistory
     */
    public static function getObject()
    {
        return new PaymentHistory(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentHistory
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentHistory(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPayments());
        self::assertNotNull($obj->getCount());
        self::assertNotNull($obj->getNextId());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentHistory $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getPayments(), PaymentTest::getObject());
        self::assertEquals(123, $obj->getCount());
        self::assertEquals('TestSample', $obj->getNextId());
    }
}
