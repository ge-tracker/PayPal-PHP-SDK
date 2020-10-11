<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentExecution;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentExecution
 *
 * @package PayPal\Test\Api
 */
class PaymentExecutionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentExecution
     * @return string
     */
    public static function getJson(): string
    {
        return '{"payer_id":"TestSample","carrier_account_id":"TestSample","transactions":[' . TransactionTest::getJson() . ']}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentExecution
     */
    public static function getObject(): PaymentExecution
    {
        return new PaymentExecution(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentExecution
     */
    public function testSerializationDeserialization(): PaymentExecution
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getPayerId(), "TestSample");
        self::assertEquals($obj->getCarrierAccountId(), "TestSample");
        self::assertEquals($obj->getTransactions(), array(TransactionTest::getObject()));
    }
}
