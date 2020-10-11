<?php

namespace PayPal\Test\Api;

use PayPal\Api\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * Class Transaction
 *
 * @package PayPal\Test\Api
 */
class TransactionTest extends TestCase
{
    /**
     * Gets Json String of Object Transaction
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Transaction
     */
    public static function getObject(): Transaction
    {
        return new Transaction(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Transaction
     */
    public function testSerializationDeserialization(): Transaction
    {
        $obj = new Transaction(self::getJson());
        self::assertNotNull($obj);
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Transaction $obj
     */
    public function testGetters($obj): void
    {
    }
}
