<?php

namespace PayPal\Test\Api;

use PayPal\Api\AgreementTransaction;
use PHPUnit\Framework\TestCase;

/**
 * Class AgreementTransaction
 */
class AgreementTransactionTest extends TestCase
{
    /**
     * Gets Json String of Object AgreementTransaction
     * @return string
     */
    public static function getJson()
    {
        return '{"transaction_id":"TestSample","status":"TestSample","transaction_type":"TestSample","amount":' . CurrencyTest::getJson() . ',"fee_amount":' . CurrencyTest::getJson() . ',"net_amount":' . CurrencyTest::getJson() . ',"payer_email":"TestSample","payer_name":"TestSample","time_stamp":"TestSample","time_zone":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return AgreementTransaction
     */
    public static function getObject()
    {
        return new AgreementTransaction(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return AgreementTransaction
     */
    public function testSerializationDeserialization()
    {
        $obj = new AgreementTransaction(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getTransactionId());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getTransactionType());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getFeeAmount());
        self::assertNotNull($obj->getNetAmount());
        self::assertNotNull($obj->getPayerEmail());
        self::assertNotNull($obj->getPayerName());
        self::assertNotNull($obj->getTimeStamp());
        self::assertNotNull($obj->getTimeZone());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementTransaction $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getTransactionId());
        self::assertEquals('TestSample', $obj->getStatus());
        self::assertEquals('TestSample', $obj->getTransactionType());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getFeeAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getNetAmount(), CurrencyTest::getObject());
        self::assertEquals('TestSample', $obj->getPayerEmail());
        self::assertEquals('TestSample', $obj->getPayerName());
        self::assertEquals('TestSample', $obj->getTimeStamp());
        self::assertEquals('TestSample', $obj->getTimeZone());
    }
}
