<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreditFinancingOffered;
use PHPUnit\Framework\TestCase;

/**
 * Class CreditFinancingOffered
 *
 * @package PayPal\Test\Api
 */
class CreditFinancingOfferedTest extends TestCase
{
    /**
     * Gets Json String of Object CreditFinancingOffered
     * @return string
     */
    public static function getJson(): string
    {
        return '{"total_cost":' .CurrencyTest::getJson() . ',"term":"12.34","monthly_payment":' .CurrencyTest::getJson() . ',"total_interest":' .CurrencyTest::getJson() . ',"payer_acceptance":true,"cart_amount_immutable":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditFinancingOffered
     */
    public static function getObject(): CreditFinancingOffered
    {
        return new CreditFinancingOffered(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreditFinancingOffered
     */
    public function testSerializationDeserialization(): CreditFinancingOffered
    {
        $obj = new CreditFinancingOffered(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getTotalCost());
        self::assertNotNull($obj->getTerm());
        self::assertNotNull($obj->getMonthlyPayment());
        self::assertNotNull($obj->getTotalInterest());
        self::assertNotNull($obj->getPayerAcceptance());
        self::assertNotNull($obj->getCartAmountImmutable());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditFinancingOffered $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getTotalCost(), CurrencyTest::getObject());
        self::assertEquals($obj->getTerm(), "12.34");
        self::assertEquals($obj->getMonthlyPayment(), CurrencyTest::getObject());
        self::assertEquals($obj->getTotalInterest(), CurrencyTest::getObject());
        self::assertEquals($obj->getPayerAcceptance(), true);
        self::assertEquals($obj->getCartAmountImmutable(), true);
    }
}
