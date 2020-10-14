<?php

namespace PayPal\Test\Api;

use PayPal\Api\PayoutBatchHeader;
use PHPUnit\Framework\TestCase;

/**
 * Class PayoutBatchHeader
 */
class PayoutBatchHeaderTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutBatchHeader
     * @return string
     */
    public static function getJson()
    {
        return '{"payout_batch_id":"TestSample","batch_status":"TestSample","time_created":"TestSample","time_completed":"TestSample","sender_batch_header":' . PayoutSenderBatchHeaderTest::getJson() . ',"amount":' . CurrencyTest::getJson() . ',"fees":' . CurrencyTest::getJson() . ',"errors":' . ErrorTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutBatchHeader
     */
    public static function getObject()
    {
        return new PayoutBatchHeader(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutBatchHeader
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutBatchHeader(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPayoutBatchId());
        self::assertNotNull($obj->getBatchStatus());
        self::assertNotNull($obj->getTimeCreated());
        self::assertNotNull($obj->getTimeCompleted());
        self::assertNotNull($obj->getSenderBatchHeader());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getFees());
        self::assertNotNull($obj->getErrors());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatchHeader $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getPayoutBatchId());
        self::assertEquals('TestSample', $obj->getBatchStatus());
        self::assertEquals('TestSample', $obj->getTimeCreated());
        self::assertEquals('TestSample', $obj->getTimeCompleted());
        self::assertEquals($obj->getSenderBatchHeader(), PayoutSenderBatchHeaderTest::getObject());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getFees(), CurrencyTest::getObject());
        self::assertEquals($obj->getErrors(), ErrorTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
