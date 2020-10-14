<?php

namespace PayPal\Test\Api;

use PayPal\Api\CurrencyConversion;
use PHPUnit\Framework\TestCase;

/**
 * Class CurrencyConversion
 */
class CurrencyConversionTest extends TestCase
{
    /**
     * Gets Json String of Object CurrencyConversion
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"conversion_date":"TestSample","from_currency":"TestSample","from_amount":"TestSample","to_currency":"TestSample","to_amount":"TestSample","conversion_type":"TestSample","conversion_type_changeable":true,"web_url":"http://www.google.com","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CurrencyConversion
     */
    public static function getObject()
    {
        return new CurrencyConversion(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CurrencyConversion
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getConversionDate());
        self::assertEquals('TestSample', $obj->getFromCurrency());
        self::assertEquals('TestSample', $obj->getFromAmount());
        self::assertEquals('TestSample', $obj->getToCurrency());
        self::assertEquals('TestSample', $obj->getToAmount());
        self::assertEquals('TestSample', $obj->getConversionType());
        self::assertEquals(true, $obj->getConversionTypeChangeable());
        self::assertEquals('http://www.google.com', $obj->getWebUrl());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    public function testUrlValidationForWebUrl()
    {
        $this->expectExceptionMessage('WebUrl is not a fully qualified URL');
        $this->expectException(\InvalidArgumentException::class);
        $obj = new CurrencyConversion();
        $obj->setWebUrl(null);
    }

    public function testUrlValidationForWebUrlDeprecated()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new CurrencyConversion();
        $obj->setWebUrl(null);
        self::assertNull($obj->getWebUrl());
    }
}
