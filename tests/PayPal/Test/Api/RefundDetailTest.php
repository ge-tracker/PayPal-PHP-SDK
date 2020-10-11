<?php

namespace PayPal\Test\Api;

use PayPal\Api\RefundDetail;
use PHPUnit\Framework\TestCase;

/**
 * Class RefundDetail
 *
 * @package PayPal\Test\Api
 */
class RefundDetailTest extends TestCase
{
    /**
     * Gets Json String of Object RefundDetail
     * @return string
     */
    public static function getJson(): string
    {
        return '{"type":"TestSample","date":"TestSample","note":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RefundDetail
     */
    public static function getObject(): RefundDetail
    {
        return new RefundDetail(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return RefundDetail
     */
    public function testSerializationDeserialization(): RefundDetail
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getTransactionId(), "TestSample");
        self::assertEquals($obj->getDate(), "TestSample");
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
