<?php

namespace PayPal\Test\Api;

use PayPal\Api\PayerInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class PayerInfo
 *
 * @package PayPal\Test\Api
 */
class PayerInfoTest extends TestCase
{
    /**
     * Gets Json String of Object PayerInfo
     * @return string
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","external_remember_me_id":"TestSample","buyer_account_number":"TestSample","salutation":"TestSample","first_name":"TestSample","middle_name":"TestSample","last_name":"TestSample","suffix":"TestSample","payer_id":"TestSample","phone":"TestSample","phone_type":"TestSample","birth_date":"TestSample","tax_id":"TestSample","tax_id_type":"TestSample","country_code":"TestSample","billing_address":' .AddressTest::getJson() . ',"shipping_address":' .ShippingAddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayerInfo
     */
    public static function getObject(): PayerInfo
    {
        return new PayerInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayerInfo
     */
    public function testSerializationDeserialization(): PayerInfo
    {
        $obj = new PayerInfo(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getExternalRememberMeId());
        self::assertNotNull($obj->getBuyerAccountNumber());
        self::assertNotNull($obj->getSalutation());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getMiddleName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getSuffix());
        self::assertNotNull($obj->getPayerId());
        self::assertNotNull($obj->getPhone());
        self::assertNotNull($obj->getPhoneType());
        self::assertNotNull($obj->getBirthDate());
        self::assertNotNull($obj->getTaxId());
        self::assertNotNull($obj->getTaxIdType());
        self::assertNotNull($obj->getCountryCode());
        self::assertNotNull($obj->getBillingAddress());
        self::assertNotNull($obj->getShippingAddress());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayerInfo $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getEmail(), "TestSample");
        self::assertEquals($obj->getExternalRememberMeId(), "TestSample");
        self::assertEquals($obj->getBuyerAccountNumber(), "TestSample");
        self::assertEquals($obj->getSalutation(), "TestSample");
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getMiddleName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getSuffix(), "TestSample");
        self::assertEquals($obj->getPayerId(), "TestSample");
        self::assertEquals($obj->getPhone(), "TestSample");
        self::assertEquals($obj->getPhoneType(), "TestSample");
        self::assertEquals($obj->getBirthDate(), "TestSample");
        self::assertEquals($obj->getTaxId(), "TestSample");
        self::assertEquals($obj->getTaxIdType(), "TestSample");
        self::assertEquals($obj->getCountryCode(), "TestSample");
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        self::assertEquals($obj->getShippingAddress(), ShippingAddressTest::getObject());
    }
}
