<?php

namespace PayPal\Test\Api;

use PayPal\Api\BankAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class BankAccount
 */
class BankAccountTest extends TestCase
{
    /**
     * Gets Json String of Object BankAccount
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","account_number":"TestSample","account_number_type":"TestSample","routing_number":"TestSample","account_type":"TestSample","account_name":"TestSample","check_type":"TestSample","auth_type":"TestSample","auth_capture_timestamp":"TestSample","bank_name":"TestSample","country_code":"TestSample","first_name":"TestSample","last_name":"TestSample","birth_date":"TestSample","billing_address":' . AddressTest::getJson() . ',"state":"TestSample","confirmation_status":"TestSample","payer_id":"TestSample","external_customer_id":"TestSample","merchant_id":"TestSample","create_time":"TestSample","update_time":"TestSample","valid_until":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankAccount
     */
    public static function getObject()
    {
        return new BankAccount(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankAccount
     */
    public function testSerializationDeserialization()
    {
        $obj = new BankAccount(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getAccountNumber());
        self::assertNotNull($obj->getAccountNumberType());
        self::assertNotNull($obj->getRoutingNumber());
        self::assertNotNull($obj->getAccountType());
        self::assertNotNull($obj->getAccountName());
        self::assertNotNull($obj->getCheckType());
        self::assertNotNull($obj->getAuthType());
        self::assertNotNull($obj->getAuthCaptureTimestamp());
        self::assertNotNull($obj->getBankName());
        self::assertNotNull($obj->getCountryCode());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getBirthDate());
        self::assertNotNull($obj->getBillingAddress());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getConfirmationStatus());
        self::assertNotNull($obj->getPayerId());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getMerchantId());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getValidUntil());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccount $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getAccountNumber());
        self::assertEquals('TestSample', $obj->getAccountNumberType());
        self::assertEquals('TestSample', $obj->getRoutingNumber());
        self::assertEquals('TestSample', $obj->getAccountType());
        self::assertEquals('TestSample', $obj->getAccountName());
        self::assertEquals('TestSample', $obj->getCheckType());
        self::assertEquals('TestSample', $obj->getAuthType());
        self::assertEquals('TestSample', $obj->getAuthCaptureTimestamp());
        self::assertEquals('TestSample', $obj->getBankName());
        self::assertEquals('TestSample', $obj->getCountryCode());
        self::assertEquals('TestSample', $obj->getFirstName());
        self::assertEquals('TestSample', $obj->getLastName());
        self::assertEquals('TestSample', $obj->getBirthDate());
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        self::assertEquals('TestSample', $obj->getState());
        self::assertEquals('TestSample', $obj->getConfirmationStatus());
        self::assertEquals('TestSample', $obj->getPayerId());
        self::assertEquals('TestSample', $obj->getExternalCustomerId());
        self::assertEquals('TestSample', $obj->getMerchantId());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
        self::assertEquals('TestSample', $obj->getValidUntil());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
