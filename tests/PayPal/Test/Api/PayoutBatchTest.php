<?php

namespace PayPal\Test\Api;

use PayPal\Api\PayoutBatch;
use PHPUnit\Framework\TestCase;

/**
 * Class PayoutBatch
 *
 * @package PayPal\Test\Api
 */
class PayoutBatchTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutBatch
     * @return string
     */
    public static function getJson(): string
    {
        return '{"batch_header":' .PayoutBatchHeaderTest::getJson() . ',"items":' .PayoutItemDetailsTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutBatch
     */
    public static function getObject(): PayoutBatch
    {
        return new PayoutBatch(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutBatch
     */
    public function testSerializationDeserialization(): PayoutBatch
    {
        $obj = new PayoutBatch(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getBatchHeader());
        self::assertNotNull($obj->getItems());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatch $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getBatchHeader(), PayoutBatchHeaderTest::getObject());
        self::assertEquals($obj->getItems(), PayoutItemDetailsTest::getObject());
    }
}
