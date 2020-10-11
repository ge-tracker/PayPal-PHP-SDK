<?php

namespace PayPal\Test\Api;

use PayPal\Api\MerchantInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantInfo
 *
 * @package PayPal\Test\Api
 */
class MerchantInfoTest extends TestCase
{
    /**
     * Gets Json String of Object MerchantInfo
     * @return string
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","address":' .AddressTest::getJson() . ',"business_name":"TestSample","phone":' .PhoneTest::getJson() . ',"fax":' .PhoneTest::getJson() . ',"website":"TestSample","tax_id":"TestSample","additional_info_label":"TestSample","additional_info":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantInfo
     */
    public static function getObject(): MerchantInfo
    {
        return new MerchantInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantInfo
     */
    public function testSerializationDeserialization(): MerchantInfo
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getEmail(), "TestSample");
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getAddress(), AddressTest::getObject());
        self::assertEquals($obj->getBusinessName(), "TestSample");
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
        self::assertEquals($obj->getFax(), PhoneTest::getObject());
        self::assertEquals($obj->getWebsite(), "TestSample");
        self::assertEquals($obj->getTaxId(), "TestSample");
        self::assertEquals($obj->getAdditionalInfoLabel(), "TestSample");
        self::assertEquals($obj->getAdditionalInfo(), "TestSample");
    }
}
