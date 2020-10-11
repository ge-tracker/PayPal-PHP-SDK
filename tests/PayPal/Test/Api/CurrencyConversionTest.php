<?php

namespace PayPal\Test\Api;

use PayPal\Api\CurrencyConversion;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyConversion
 *
 * @package PayPal\Test\Api
 */
class CurrencyConversionTest extends TestCase
{
    /**
     * Gets Json String of Object CurrencyConversion
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{"conversion_date":"TestSample","from_currency":"TestSample","from_amount":"TestSample","to_currency":"TestSample","to_amount":"TestSample","conversion_type":"TestSample","conversion_type_changeable":true,"web_url":"http://www.google.com","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CurrencyConversion
     */
    public static function getObject(): CurrencyConversion
    {
        return new CurrencyConversion(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CurrencyConversion
     */
    public function testSerializationDeserialization(): CurrencyConversion
    {
        $obj = new CurrencyConversion(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getConversionDate());
        self::assertNotNull($obj->getFromCurrency());
        self::assertNotNull($obj->getFromAmount());
        self::assertNotNull($obj->getToCurrency());
        self::assertNotNull($obj->getToAmount());
        self::assertNotNull($obj->getConversionType());
        self::assertNotNull($obj->getConversionTypeChangeable());
        self::assertNotNull($obj->getWebUrl());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CurrencyConversion $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getConversionDate(), "TestSample");
        self::assertEquals($obj->getFromCurrency(), "TestSample");
        self::assertEquals($obj->getFromAmount(), "TestSample");
        self::assertEquals($obj->getToCurrency(), "TestSample");
        self::assertEquals($obj->getToAmount(), "TestSample");
        self::assertEquals($obj->getConversionType(), "TestSample");
        self::assertEquals($obj->getConversionTypeChangeable(), true);
        self::assertEquals($obj->getWebUrl(), "http://www.google.com");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage WebUrl is not a fully qualified URL
     */
    public function testUrlValidationForWebUrl(): void
    {
        $obj = new CurrencyConversion();
        $obj->setWebUrl(null);
    }

    public function testUrlValidationForWebUrlDeprecated(): void
    {
        $obj = new CurrencyConversion();
        $obj->setWebUrl(null);
        self::assertNull($obj->getWebUrl());
    }
}
