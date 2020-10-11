<?php

namespace PayPal\Test\Api;

use PayPal\Api\Terms;
use PHPUnit\Framework\TestCase;

/**
 * Class Terms
 *
 * @package PayPal\Test\Api
 */
class TermsTest extends TestCase
{
    /**
     * Gets Json String of Object Terms
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","type":"TestSample","max_billing_amount":' .CurrencyTest::getJson() . ',"occurrences":"TestSample","amount_range":' .CurrencyTest::getJson() . ',"buyer_editable":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Terms
     */
    public static function getObject(): Terms
    {
        return new Terms(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Terms
     */
    public function testSerializationDeserialization(): Terms
    {
        $obj = new Terms(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getMaxBillingAmount());
        self::assertNotNull($obj->getOccurrences());
        self::assertNotNull($obj->getAmountRange());
        self::assertNotNull($obj->getBuyerEditable());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Terms $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getMaxBillingAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getOccurrences(), "TestSample");
        self::assertEquals($obj->getAmountRange(), CurrencyTest::getObject());
        self::assertEquals($obj->getBuyerEditable(), "TestSample");
    }
}
