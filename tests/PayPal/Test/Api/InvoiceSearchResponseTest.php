<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceSearchResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class InvoiceSearchResponse
 *
 * @package PayPal\Test\Api
 */
class InvoiceSearchResponseTest extends TestCase
{
    /**
     * Gets Json String of Object InvoiceSearchResponse
     * @return string
     */
    public static function getJson(): string
    {
        return '{"total_count":123,"invoices":' .InvoiceTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceSearchResponse
     */
    public static function getObject(): InvoiceSearchResponse
    {
        return new InvoiceSearchResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceSearchResponse
     */
    public function testSerializationDeserialization(): InvoiceSearchResponse
    {
        $obj = new InvoiceSearchResponse(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getTotalCount());
        self::assertNotNull($obj->getInvoices());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceSearchResponse $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getTotalCount(), 123);
        self::assertEquals($obj->getInvoices(), InvoiceTest::getObject());
    }
}
