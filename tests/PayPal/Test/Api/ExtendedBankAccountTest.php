<?php

namespace PayPal\Test\Api;

use PayPal\Api\ExtendedBankAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class ExtendedBankAccount
 *
 * @package PayPal\Test\Api
 */
class ExtendedBankAccountTest extends TestCase
{
    /**
     * Gets Json String of Object ExtendedBankAccount
     * @return string
     */
    public static function getJson(): string
    {
        return '{"mandate_reference_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ExtendedBankAccount
     */
    public static function getObject(): ExtendedBankAccount
    {
        return new ExtendedBankAccount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return ExtendedBankAccount
     */
    public function testSerializationDeserialization(): ExtendedBankAccount
    {
        $obj = new ExtendedBankAccount(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getMandateReferenceNumber());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ExtendedBankAccount $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getMandateReferenceNumber(), "TestSample");
    }
}
