<?php

namespace PayPal\Test\Api;

use PayPal\Api\DetailedRefund;
use PHPUnit\Framework\TestCase;

/**
 * Class DetailedRefund
 *
 * @package PayPal\Test\Api
 */
class DetailedRefundTest extends TestCase
{
    /**
     * Gets Json String of Object DetailedRefund
     * @return string
     */
    public static function getJson()
    {
        return '{"custom":"TestSample","invoice_number":"TestSample","refund_to_payer":' .CurrencyTest::getJson() . ',"refund_to_external_funding":' .ExternalFundingTest::getJson() . ',"refund_from_transaction_fee":' .CurrencyTest::getJson() . ',"refund_from_received_amount":' .CurrencyTest::getJson() . ',"total_refunded_amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return DetailedRefund
     */
    public static function getObject()
    {
        return new DetailedRefund(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return DetailedRefund
     */
    public function testSerializationDeserialization()
    {
        $obj = new DetailedRefund(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCustom());
        self::assertNotNull($obj->getInvoiceNumber());
        self::assertNotNull($obj->getRefundToPayer());
        self::assertNotNull($obj->getRefundToExternalFunding());
        self::assertNotNull($obj->getRefundFromTransactionFee());
        self::assertNotNull($obj->getRefundFromReceivedAmount());
        self::assertNotNull($obj->getTotalRefundedAmount());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param DetailedRefund $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getCustom());
        self::assertEquals("TestSample", $obj->getInvoiceNumber());
        self::assertEquals($obj->getRefundToPayer(), CurrencyTest::getObject());
        self::assertEquals($obj->getRefundToExternalFunding(), ExternalFundingTest::getObject());
        self::assertEquals($obj->getRefundFromTransactionFee(), CurrencyTest::getObject());
        self::assertEquals($obj->getRefundFromReceivedAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getTotalRefundedAmount(), CurrencyTest::getObject());
    }


}
