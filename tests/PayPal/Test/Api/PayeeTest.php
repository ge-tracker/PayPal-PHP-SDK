<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payee;
use PHPUnit\Framework\TestCase;

/**
 * Class Payee
 */
class PayeeTest extends TestCase
{
    /**
     * Gets Json String of Object Payee
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","merchant_id":"TestSample","first_name":"TestSample","last_name":"TestSample","account_number":"TestSample","phone":' . PhoneTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payee
     */
    public static function getObject()
    {
        return new Payee(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payee
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getEmail());
        self::assertEquals('TestSample', $obj->getMerchantId());
        self::assertEquals('TestSample', $obj->getFirstName());
        self::assertEquals('TestSample', $obj->getLastName());
        self::assertEquals('TestSample', $obj->getAccountNumber());
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
    }
}
