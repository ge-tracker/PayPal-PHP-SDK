<?php

namespace PayPal\Test\Api;

use PayPal\Api\PayoutItemDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class PayoutItemDetails
 */
class PayoutItemDetailsTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutItemDetails
     * @return string
     */
    public static function getJson()
    {
        return '{"payout_item_id":"TestSample","transaction_id":"TestSample","transaction_status":"TestSample","payout_item_fee":' . CurrencyTest::getJson() . ',"payout_batch_id":"TestSample","sender_batch_id":"TestSample","payout_item":' . PayoutItemTest::getJson() . ',"time_processed":"TestSample","errors":' . ErrorTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutItemDetails
     */
    public static function getObject()
    {
        return new PayoutItemDetails(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutItemDetails
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutItemDetails(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPayoutItemId());
        self::assertNotNull($obj->getTransactionId());
        self::assertNotNull($obj->getTransactionStatus());
        self::assertNotNull($obj->getPayoutItemFee());
        self::assertNotNull($obj->getPayoutBatchId());
        self::assertNotNull($obj->getSenderBatchId());
        self::assertNotNull($obj->getPayoutItem());
        self::assertNotNull($obj->getTimeProcessed());
        self::assertNotNull($obj->getErrors());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItemDetails $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getPayoutItemId());
        self::assertEquals('TestSample', $obj->getTransactionId());
        self::assertEquals('TestSample', $obj->getTransactionStatus());
        self::assertEquals($obj->getPayoutItemFee(), CurrencyTest::getObject());
        self::assertEquals('TestSample', $obj->getPayoutBatchId());
        self::assertEquals('TestSample', $obj->getSenderBatchId());
        self::assertEquals($obj->getPayoutItem(), PayoutItemTest::getObject());
        self::assertEquals('TestSample', $obj->getTimeProcessed());
        self::assertEquals($obj->getErrors(), ErrorTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
