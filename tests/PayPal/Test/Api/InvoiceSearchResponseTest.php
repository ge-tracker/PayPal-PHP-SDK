<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceSearchResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class InvoiceSearchResponse
 */
class InvoiceSearchResponseTest extends TestCase
{
    /**
     * Gets Json String of Object InvoiceSearchResponse
     * @return string
     */
    public static function getJson()
    {
        return '{"total_count":123,"invoices":' . InvoiceTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceSearchResponse
     */
    public static function getObject()
    {
        return new InvoiceSearchResponse(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceSearchResponse
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals(123, $obj->getTotalCount());
        self::assertEquals($obj->getInvoices(), InvoiceTest::getObject());
    }
}
