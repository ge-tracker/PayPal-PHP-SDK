<?php

namespace PayPal\Test\Api;

use PayPal\Api\BankToken;
use PHPUnit\Framework\TestCase;

/**
 * Class BankToken
 */
class BankTokenTest extends TestCase
{
    /**
     * Gets Json String of Object BankToken
     * @return string
     */
    public static function getJson()
    {
        return '{"bank_id":"TestSample","external_customer_id":"TestSample","mandate_reference_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankToken
     */
    public static function getObject()
    {
        return new BankToken(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new BankToken(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getBankId());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getMandateReferenceNumber());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankToken $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getBankId());
        self::assertEquals('TestSample', $obj->getExternalCustomerId());
        self::assertEquals('TestSample', $obj->getMandateReferenceNumber());
    }
}
