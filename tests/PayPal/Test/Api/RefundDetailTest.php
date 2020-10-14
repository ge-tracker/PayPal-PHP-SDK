<?php

namespace PayPal\Test\Api;

use PayPal\Api\RefundDetail;
use PHPUnit\Framework\TestCase;

/**
 * Class RefundDetail
 */
class RefundDetailTest extends TestCase
{
    /**
     * Gets Json String of Object RefundDetail
     * @return string
     */
    public static function getJson()
    {
        return '{"type":"TestSample","date":"TestSample","transaction_id":"TestSample","note":"TestSample","amount":' . CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RefundDetail
     */
    public static function getObject()
    {
        return new RefundDetail(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return RefundDetail
     */
    public function testSerializationDeserialization()
    {
        $obj = new RefundDetail(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getTransactionId());
        self::assertNotNull($obj->getDate());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param RefundDetail $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getType());
        self::assertEquals('TestSample', $obj->getTransactionId());
        self::assertEquals('TestSample', $obj->getDate());
        self::assertEquals('TestSample', $obj->getNote());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
