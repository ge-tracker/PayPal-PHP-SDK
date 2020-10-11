<?php

namespace PayPal\Test\Api;

use PayPal\Api\PotentialPayerInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class PotentialPayerInfo
 *
 * @package PayPal\Test\Api
 */
class PotentialPayerInfoTest extends TestCase
{
    /**
     * Gets Json String of Object PotentialPayerInfo
     * @return string
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","external_remember_me_id":"TestSample","account_number":"TestSample","billing_address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PotentialPayerInfo
     */
    public static function getObject(): PotentialPayerInfo
    {
        return new PotentialPayerInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PotentialPayerInfo
     */
    public function testSerializationDeserialization(): PotentialPayerInfo
    {
        $obj = new PotentialPayerInfo(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getExternalRememberMeId());
        self::assertNotNull($obj->getAccountNumber());
        self::assertNotNull($obj->getBillingAddress());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PotentialPayerInfo $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getEmail(), "TestSample");
        self::assertEquals($obj->getExternalRememberMeId(), "TestSample");
        self::assertEquals($obj->getAccountNumber(), "TestSample");
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
    }
}
