<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingDetail;
use PHPUnit\Framework\TestCase;

/**
 * Class FundingDetail
 *
 * @package PayPal\Test\Api
 */
class FundingDetailTest extends TestCase
{
    /**
     * Gets Json String of Object FundingDetail
     * @return string
     */
    public static function getJson()
    {
        return '{"clearing_time":"TestSample","payment_hold_date":"TestSample","payment_debit_date":"TestSample","processing_type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingDetail
     */
    public static function getObject()
    {
        return new FundingDetail(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingDetail
     */
    public function testSerializationDeserialization()
    {
        $obj = new FundingDetail(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getClearingTime());
        self::assertNotNull($obj->getPaymentHoldDate());
        self::assertNotNull($obj->getPaymentDebitDate());
        self::assertNotNull($obj->getProcessingType());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingDetail $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getClearingTime());
        self::assertEquals("TestSample", $obj->getPaymentHoldDate());
        self::assertEquals("TestSample", $obj->getPaymentDebitDate());
        self::assertEquals("TestSample", $obj->getProcessingType());
    }
}
