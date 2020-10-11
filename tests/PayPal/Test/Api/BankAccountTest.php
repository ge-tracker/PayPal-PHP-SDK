<?php

namespace PayPal\Test\Api;

use PayPal\Api\BankAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class BankAccount
 *
 * @package PayPal\Test\Api
 */
class BankAccountTest extends TestCase
{
    /**
     * Gets Json String of Object BankAccount
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","account_number":"TestSample","account_number_type":"TestSample","routing_number":"TestSample","account_type":"TestSample","account_name":"TestSample","check_type":"TestSample","auth_type":"TestSample","auth_capture_timestamp":"TestSample","bank_name":"TestSample","country_code":"TestSample","first_name":"TestSample","last_name":"TestSample","birth_date":"TestSample","billing_address":' .AddressTest::getJson() . ',"state":"TestSample","confirmation_status":"TestSample","payer_id":"TestSample","external_customer_id":"TestSample","merchant_id":"TestSample","create_time":"TestSample","update_time":"TestSample","valid_until":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankAccount
     */
    public static function getObject(): BankAccount
    {
        return new BankAccount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankAccount
     */
    public function testSerializationDeserialization(): BankAccount
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getAccountNumber(), "TestSample");
        self::assertEquals($obj->getAccountNumberType(), "TestSample");
        self::assertEquals($obj->getRoutingNumber(), "TestSample");
        self::assertEquals($obj->getAccountType(), "TestSample");
        self::assertEquals($obj->getAccountName(), "TestSample");
        self::assertEquals($obj->getCheckType(), "TestSample");
        self::assertEquals($obj->getAuthType(), "TestSample");
        self::assertEquals($obj->getAuthCaptureTimestamp(), "TestSample");
        self::assertEquals($obj->getBankName(), "TestSample");
        self::assertEquals($obj->getCountryCode(), "TestSample");
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getBirthDate(), "TestSample");
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getConfirmationStatus(), "TestSample");
        self::assertEquals($obj->getPayerId(), "TestSample");
        self::assertEquals($obj->getExternalCustomerId(), "TestSample");
        self::assertEquals($obj->getMerchantId(), "TestSample");
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getValidUntil(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
