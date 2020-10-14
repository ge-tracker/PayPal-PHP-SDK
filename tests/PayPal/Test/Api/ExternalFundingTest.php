<?php

namespace PayPal\Test\Api;

use PayPal\Api\ExternalFunding;
use PHPUnit\Framework\TestCase;

/**
 * Class ExternalFunding
 *
 * @package PayPal\Test\Api
 */
class ExternalFundingTest extends TestCase
{
    /**
     * Gets Json String of Object ExternalFunding
     * @return string
     */
    public static function getJson()
    {
        return '{"reference_id":"TestSample","code":"TestSample","funding_account_id":"TestSample","display_text":"TestSample","amount":' .AmountTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ExternalFunding
     */
    public static function getObject()
    {
        return new ExternalFunding(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ExternalFunding
     */
    public function testSerializationDeserialization()
    {
        $obj = new ExternalFunding(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getReferenceId());
        self::assertNotNull($obj->getCode());
        self::assertNotNull($obj->getFundingAccountId());
        self::assertNotNull($obj->getDisplayText());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ExternalFunding $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getReferenceId());
        self::assertEquals("TestSample", $obj->getCode());
        self::assertEquals("TestSample", $obj->getFundingAccountId());
        self::assertEquals("TestSample", $obj->getDisplayText());
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
    }
}
