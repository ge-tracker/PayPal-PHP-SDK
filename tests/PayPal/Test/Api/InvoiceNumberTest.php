<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceNumber;
use PHPUnit\Framework\TestCase;

/**
 * Class Cost
 *
 * @package PayPal\Test\Api
 */
class InvoiceNumberTest extends TestCase
{
    /**
     * Gets Json String of Object Cost
     * @return string
     */
    public static function getJson(): string
    {
        return '{"number":"1234"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceNumber
     */
    public static function getObject(): InvoiceNumber
    {
        return new InvoiceNumber(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceNumber
     */
    public function testSerializationDeserialization(): InvoiceNumber
    {
        $obj = new InvoiceNumber(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getNumber());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceNumber $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getNumber(), "1234");
    }
}
