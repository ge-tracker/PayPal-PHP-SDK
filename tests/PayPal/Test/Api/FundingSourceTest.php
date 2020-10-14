<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingSource;
use PHPUnit\Framework\TestCase;

/**
 * Class FundingSource
 *
 * @package PayPal\Test\Api
 */
class FundingSourceTest extends TestCase
{
    /**
     * Gets Json String of Object FundingSource
     * @return string
     */
    public static function getJson()
    {
        return '{"funding_mode":"TestSample","funding_instrument_type":"TestSample","soft_descriptor":"TestSample","amount":' .CurrencyTest::getJson() . ',"negative_balance_amount":' .CurrencyTest::getJson() . ',"legal_text":"TestSample","terms":"TestSample","funding_detail":' .FundingDetailTest::getJson() . ',"additional_text":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingSource
     */
    public static function getObject()
    {
        return new FundingSource(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingSource
     */
    public function testSerializationDeserialization()
    {
        $obj = new FundingSource(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getFundingMode());
        self::assertNotNull($obj->getFundingInstrumentType());
        self::assertNotNull($obj->getSoftDescriptor());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getNegativeBalanceAmount());
        self::assertNotNull($obj->getLegalText());
        self::assertNotNull($obj->getFundingDetail());
        self::assertNotNull($obj->getAdditionalText());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingSource $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getFundingMode());
        self::assertEquals("TestSample", $obj->getFundingInstrumentType());
        self::assertEquals("TestSample", $obj->getSoftDescriptor());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getNegativeBalanceAmount(), CurrencyTest::getObject());
        self::assertEquals("TestSample", $obj->getLegalText());
        self::assertEquals($obj->getFundingDetail(), FundingDetailTest::getObject());
        self::assertEquals("TestSample", $obj->getAdditionalText());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
