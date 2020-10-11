<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentDetail;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentDetail
 *
 * @package PayPal\Test\Api
 */
class PaymentDetailTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDetail
     * @return string
     */
    public static function getJson(): string
    {
        return '{"type":"TestSample","transaction_id":"TestSample","transaction_type":"TestSample","date":"TestSample","method":"TestSample","note":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentDetail
     */
    public static function getObject(): PaymentDetail
    {
        return new PaymentDetail(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentDetail
     */
    public function testSerializationDeserialization(): PaymentDetail
    {
        $obj = new PaymentDetail(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getTransactionId());
        self::assertNotNull($obj->getTransactionType());
        self::assertNotNull($obj->getDate());
        self::assertNotNull($obj->getMethod());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDetail $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getTransactionId(), "TestSample");
        self::assertEquals($obj->getTransactionType(), "TestSample");
        self::assertEquals($obj->getDate(), "TestSample");
        self::assertEquals($obj->getMethod(), "TestSample");
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
