<?php

namespace PayPal\Test\Api;

use PayPal\Api\BaseAddress;
use PayPal\Api\MerchantInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantInfo
 */
class MerchantInfoTest extends TestCase
{
    /**
     * Gets Json String of Object MerchantInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","address":' . AddressTest::getJson() . ',"business_name":"TestSample","phone":' . PhoneTest::getJson() . ',"fax":' . PhoneTest::getJson() . ',"website":"TestSample","tax_id":"TestSample","additional_info_label":"TestSample","additional_info":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantInfo
     */
    public static function getObject()
    {
        return new MerchantInfo(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new MerchantInfo(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getAddress());
        self::assertNotNull($obj->getBusinessName());
        self::assertNotNull($obj->getPhone());
        self::assertNotNull($obj->getFax());
        self::assertNotNull($obj->getWebsite());
        self::assertNotNull($obj->getTaxId());
        self::assertNotNull($obj->getAdditionalInfoLabel());
        self::assertNotNull($obj->getAdditionalInfo());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantInfo $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getEmail());
        self::assertEquals('TestSample', $obj->getFirstName());
        self::assertEquals('TestSample', $obj->getLastName());
        self::assertInstanceOf(BaseAddress::class, $obj->getAddress());
        self::assertEquals('TestSample', $obj->getBusinessName());
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
        self::assertEquals($obj->getFax(), PhoneTest::getObject());
        self::assertEquals('TestSample', $obj->getWebsite());
        self::assertEquals('TestSample', $obj->getTaxId());
        self::assertEquals('TestSample', $obj->getAdditionalInfoLabel());
        self::assertEquals('TestSample', $obj->getAdditionalInfo());
    }
}
