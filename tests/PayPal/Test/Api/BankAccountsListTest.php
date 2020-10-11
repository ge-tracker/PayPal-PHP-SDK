<?php

namespace PayPal\Test\Api;

use PayPal\Api\BankAccountsList;
use PHPUnit\Framework\TestCase;

/**
 * Class BankAccountsList
 *
 * @package PayPal\Test\Api
 */
class BankAccountsListTest extends TestCase
{
    /**
     * Gets Json String of Object BankAccountsList
     * @return string
     */
    public static function getJson(): string
    {
        return '{"bank-accounts":' .BankAccountTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankAccountsList
     */
    public static function getObject(): BankAccountsList
    {
        return new BankAccountsList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankAccountsList
     */
    public function testSerializationDeserialization(): BankAccountsList
    {
        $obj = new BankAccountsList(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getBankAccounts());
        self::assertNotNull($obj->getCount());
        self::assertNotNull($obj->getNextId());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccountsList $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getBankAccounts(), BankAccountTest::getObject());
        self::assertEquals($obj->getCount(), 123);
        self::assertEquals($obj->getNextId(), "TestSample");
    }
}
