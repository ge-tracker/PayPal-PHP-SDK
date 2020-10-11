<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payee;
use PHPUnit\Framework\TestCase;

/**
 * Class Payee
 *
 * @package PayPal\Test\Api
 */
class PayeeTest extends TestCase
{
    /**
     * Gets Json String of Object Payee
     * @return string
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","merchant_id":"TestSample","first_name":"TestSample","last_name":"TestSample","account_number":"TestSample","phone":' .PhoneTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payee
     */
    public static function getObject(): Payee
    {
        return new Payee(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payee
     */
    public function testSerializationDeserialization(): Payee
    {
        $obj = new Payee(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getMerchantId());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getAccountNumber());
        self::assertNotNull($obj->getPhone());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payee $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getEmail(), "TestSample");
        self::assertEquals($obj->getMerchantId(), "TestSample");
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getAccountNumber(), "TestSample");
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
    }
}
