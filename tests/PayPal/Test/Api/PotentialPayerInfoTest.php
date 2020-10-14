<?php

namespace PayPal\Test\Api;

use PayPal\Api\PotentialPayerInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class PotentialPayerInfo
 */
class PotentialPayerInfoTest extends TestCase
{
    /**
     * Gets Json String of Object PotentialPayerInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","external_remember_me_id":"TestSample","account_number":"TestSample","billing_address":' . AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PotentialPayerInfo
     */
    public static function getObject()
    {
        return new PotentialPayerInfo(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PotentialPayerInfo
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getEmail());
        self::assertEquals('TestSample', $obj->getExternalRememberMeId());
        self::assertEquals('TestSample', $obj->getAccountNumber());
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
    }
}
