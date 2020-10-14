<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingOption;
use PHPUnit\Framework\TestCase;

/**
 * Class FundingOption
 */
class FundingOptionTest extends TestCase
{
    /**
     * Gets Json String of Object FundingOption
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","funding_sources":' . FundingSourceTest::getJson() . ',"backup_funding_instrument":' . FundingInstrumentTest::getJson() . ',"currency_conversion":' . CurrencyConversionTest::getJson() . ',"installment_info":' . InstallmentInfoTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingOption
     */
    public static function getObject()
    {
        return new FundingOption(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingOption
     */
    public function testSerializationDeserialization()
    {
        $obj = new FundingOption(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getFundingSources());
        self::assertNotNull($obj->getBackupFundingInstrument());
        self::assertNotNull($obj->getCurrencyConversion());
        self::assertNotNull($obj->getInstallmentInfo());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingOption $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals($obj->getFundingSources(), FundingSourceTest::getObject());
        self::assertEquals($obj->getBackupFundingInstrument(), FundingInstrumentTest::getObject());
        self::assertEquals($obj->getCurrencyConversion(), CurrencyConversionTest::getObject());
        self::assertEquals($obj->getInstallmentInfo(), InstallmentInfoTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
