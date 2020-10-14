<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentExecution;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentExecution
 */
class PaymentExecutionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentExecution
     * @return string
     */
    public static function getJson()
    {
        return '{"payer_id":"TestSample","carrier_account_id":"TestSample","transactions":[' . TransactionTest::getJson() . ']}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentExecution
     */
    public static function getObject()
    {
        return new PaymentExecution(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentExecution
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentExecution(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPayerId());
        self::assertNotNull($obj->getCarrierAccountId());
        self::assertNotNull($obj->getTransactions());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentExecution $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getPayerId());
        self::assertEquals('TestSample', $obj->getCarrierAccountId());
        self::assertEquals($obj->getTransactions(), [TransactionTest::getObject()]);
    }
}
