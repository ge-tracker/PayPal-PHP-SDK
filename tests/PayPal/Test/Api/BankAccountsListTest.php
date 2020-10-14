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
    public static function getJson()
    {
        return '{"bank-accounts":' .BankAccountTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return BankAccountsList
     */
    public static function getObject()
    {
        return new BankAccountsList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return BankAccountsList
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals($obj->getBankAccounts(), BankAccountTest::getObject());
        self::assertEquals(123, $obj->getCount());
        self::assertEquals("TestSample", $obj->getNextId());
    }
}
