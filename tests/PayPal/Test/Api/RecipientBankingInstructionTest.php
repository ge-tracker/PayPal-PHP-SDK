<?php

namespace PayPal\Test\Api;

use PayPal\Api\RecipientBankingInstruction;
use PHPUnit\Framework\TestCase;

/**
 * Class RecipientBankingInstruction
 */
class RecipientBankingInstructionTest extends TestCase
{
    /**
     * Gets Json String of Object RecipientBankingInstruction
     * @return string
     */
    public static function getJson()
    {
        return '{"bank_name":"TestSample","account_holder_name":"TestSample","account_number":"TestSample","routing_number":"TestSample","international_bank_account_number":"TestSample","bank_identifier_code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RecipientBankingInstruction
     */
    public static function getObject()
    {
        return new RecipientBankingInstruction(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return RecipientBankingInstruction
     */
    public function testSerializationDeserialization()
    {
        $obj = new RecipientBankingInstruction(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getBankName());
        self::assertNotNull($obj->getAccountHolderName());
        self::assertNotNull($obj->getAccountNumber());
        self::assertNotNull($obj->getRoutingNumber());
        self::assertNotNull($obj->getInternationalBankAccountNumber());
        self::assertNotNull($obj->getBankIdentifierCode());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param RecipientBankingInstruction $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getBankName());
        self::assertEquals('TestSample', $obj->getAccountHolderName());
        self::assertEquals('TestSample', $obj->getAccountNumber());
        self::assertEquals('TestSample', $obj->getRoutingNumber());
        self::assertEquals('TestSample', $obj->getInternationalBankAccountNumber());
        self::assertEquals('TestSample', $obj->getBankIdentifierCode());
    }
}
