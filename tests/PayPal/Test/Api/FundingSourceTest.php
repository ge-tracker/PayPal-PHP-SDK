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
    public static function getJson(): string
    {
        return '{"funding_mode":"TestSample","funding_instrument_type":"TestSample","soft_descriptor":"TestSample","amount":' .CurrencyTest::getJson() . ',"negative_balance_amount":' .CurrencyTest::getJson() . ',"legal_text":"TestSample","terms":"TestSample","funding_detail":' .FundingDetailTest::getJson() . ',"additional_text":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingSource
     */
    public static function getObject(): FundingSource
    {
        return new FundingSource(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingSource
     */
    public function testSerializationDeserialization(): FundingSource
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getFundingMode(), "TestSample");
        self::assertEquals($obj->getFundingInstrumentType(), "TestSample");
        self::assertEquals($obj->getSoftDescriptor(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getNegativeBalanceAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getLegalText(), "TestSample");
        self::assertEquals($obj->getFundingDetail(), FundingDetailTest::getObject());
        self::assertEquals($obj->getAdditionalText(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
