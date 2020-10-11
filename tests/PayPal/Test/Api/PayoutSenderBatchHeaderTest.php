<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\PayoutSenderBatchHeader;
use PHPUnit\Framework\TestCase;

/**
 * Class PayoutSenderBatchHeader
 *
 * @package PayPal\Test\Api
 */
class PayoutSenderBatchHeaderTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutSenderBatchHeader
     * @return string
     */
    public static function getJson(): string
    {
        return '{"sender_batch_id":"TestSample","email_subject":"TestSample","recipient_type":"TestSample","batch_status":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutSenderBatchHeader
     */
    public static function getObject(): PayoutSenderBatchHeader
    {
        return new PayoutSenderBatchHeader(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutSenderBatchHeader
     */
    public function testSerializationDeserialization(): PayoutSenderBatchHeader
    {
        $obj = new PayoutSenderBatchHeader(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSenderBatchId());
        self::assertNotNull($obj->getEmailSubject());
        self::assertNotNull($obj->getRecipientType());
        self::assertNotNull($obj->getBatchStatus());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutSenderBatchHeader $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getSenderBatchId(), "TestSample");
        self::assertEquals($obj->getEmailSubject(), "TestSample");
        self::assertEquals($obj->getRecipientType(), "TestSample");
        self::assertEquals($obj->getBatchStatus(), "TestSample");
    }
}
