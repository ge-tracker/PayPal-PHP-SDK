<?php

namespace PayPal\Test\Api;

use PayPal\Api\InstallmentOption;
use PHPUnit\Framework\TestCase;

/**
 * Class InstallmentOption
 *
 * @package PayPal\Test\Api
 */
class InstallmentOptionTest extends TestCase
{
    /**
     * Gets Json String of Object InstallmentOption
     * @return string
     */
    public static function getJson(): string
    {
        return '{"term":123,"monthly_payment":' . CurrencyTest::getJson() . ',"discount_amount":' . CurrencyTest::getJson() . ',"discount_percentage":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InstallmentOption
     */
    public static function getObject(): InstallmentOption
    {
        return new InstallmentOption(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InstallmentOption
     */
    public function testSerializationDeserialization(): InstallmentOption
    {
        $obj = new InstallmentOption(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getTerm());
        self::assertNotNull($obj->getMonthlyPayment());
        self::assertNotNull($obj->getDiscountAmount());
        self::assertNotNull($obj->getDiscountPercentage());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InstallmentOption $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getTerm(), 123);
        self::assertEquals($obj->getMonthlyPayment(), CurrencyTest::getObject());
        self::assertEquals($obj->getDiscountAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getDiscountPercentage(), "TestSample");
    }
}
