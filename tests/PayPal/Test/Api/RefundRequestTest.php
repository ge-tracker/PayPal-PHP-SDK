<?php

namespace PayPal\Test\Api;

use PayPal\Api\RefundRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class RefundRequest
 *
 * @package PayPal\Test\Api
 */
class RefundRequestTest extends TestCase
{
    /**
     * Gets Json String of Object RefundRequest
     * @return string
     */
    public static function getJson()
    {
        return '{"amount":' .AmountTest::getJson() . ',"description":"TestSample","refund_type":"TestSample","refund_source":"TestSample","reason":"TestSample","invoice_number":"TestSample","refund_advice":true,"is_non_platform_transaction":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RefundRequest
     */
    public static function getObject()
    {
        return new RefundRequest(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return RefundRequest
     */
    public function testSerializationDeserialization()
    {
        $obj = new RefundRequest(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getRefundSource());
        self::assertNotNull($obj->getReason());
        self::assertNotNull($obj->getInvoiceNumber());
        self::assertNotNull($obj->getRefundAdvice());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param RefundRequest $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals("TestSample", $obj->getDescription());
        self::assertEquals("TestSample", $obj->getRefundSource());
        self::assertEquals("TestSample", $obj->getReason());
        self::assertEquals("TestSample", $obj->getInvoiceNumber());
        self::assertEquals(true, $obj->getRefundAdvice());
    }


}
