<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payer;
use PHPUnit\Framework\TestCase;

/**
 * Class Payer
 *
 * @package PayPal\Test\Api
 */
class PayerTest extends TestCase
{
    /**
     * Gets Json String of Object Payer
     * @return string
     */
    public static function getJson(): string
    {
        return '{"payment_method":"TestSample","status":"TestSample","account_type":"TestSample","account_age":"TestSample","funding_instruments":' .FundingInstrumentTest::getJson() . ',"funding_option_id":"TestSample","funding_option":' .FundingOptionTest::getJson() . ',"external_selected_funding_instrument_type":"TestSample","related_funding_option":' .FundingOptionTest::getJson() . ',"payer_info":' .PayerInfoTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payer
     */
    public static function getObject(): Payer
    {
        return new Payer(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payer
     */
    public function testSerializationDeserialization(): Payer
    {
        $obj = new Payer(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPaymentMethod());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getAccountType());
        self::assertNotNull($obj->getAccountAge());
        self::assertNotNull($obj->getFundingInstruments());
        self::assertNotNull($obj->getFundingOptionId());
        self::assertNotNull($obj->getFundingOption());
        self::assertNotNull($obj->getExternalSelectedFundingInstrumentType());
        self::assertNotNull($obj->getRelatedFundingOption());
        self::assertNotNull($obj->getPayerInfo());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payer $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getPaymentMethod(), "TestSample");
        self::assertEquals($obj->getStatus(), "TestSample");
        self::assertEquals($obj->getAccountType(), "TestSample");
        self::assertEquals($obj->getAccountAge(), "TestSample");
        self::assertEquals($obj->getFundingInstruments(), FundingInstrumentTest::getObject());
        self::assertEquals($obj->getFundingOptionId(), "TestSample");
        self::assertEquals($obj->getFundingOption(), FundingOptionTest::getObject());
        self::assertEquals($obj->getExternalSelectedFundingInstrumentType(), "TestSample");
        self::assertEquals($obj->getRelatedFundingOption(), FundingOptionTest::getObject());
        self::assertEquals($obj->getPayerInfo(), PayerInfoTest::getObject());
    }
}
