<?php

namespace PayPal\Test\Api;

use PayPal\Api\Search;
use PHPUnit\Framework\TestCase;

/**
 * Class Search
 *
 * @package PayPal\Test\Api
 */
class SearchTest extends TestCase
{
    /**
     * Gets Json String of Object Search
     * @return string
     */
    public static function getJson()
    {
        return '{"email":"TestSample","recipient_first_name":"TestSample","recipient_last_name":"TestSample","recipient_business_name":"TestSample","number":"TestSample","status":"TestSample","lower_total_amount":' .CurrencyTest::getJson() . ',"upper_total_amount":' .CurrencyTest::getJson() . ',"start_invoice_date":"TestSample","end_invoice_date":"TestSample","start_due_date":"TestSample","end_due_date":"TestSample","start_payment_date":"TestSample","end_payment_date":"TestSample","start_creation_date":"TestSample","end_creation_date":"TestSample","page":"12.34","page_size":"12.34","total_count_required":true,"archived":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Search
     */
    public static function getObject()
    {
        return new Search(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Search
     */
    public function testSerializationDeserialization()
    {
        $obj = new Search(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getRecipientFirstName());
        self::assertNotNull($obj->getRecipientLastName());
        self::assertNotNull($obj->getRecipientBusinessName());
        self::assertNotNull($obj->getNumber());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getLowerTotalAmount());
        self::assertNotNull($obj->getUpperTotalAmount());
        self::assertNotNull($obj->getStartInvoiceDate());
        self::assertNotNull($obj->getEndInvoiceDate());
        self::assertNotNull($obj->getStartDueDate());
        self::assertNotNull($obj->getEndDueDate());
        self::assertNotNull($obj->getStartPaymentDate());
        self::assertNotNull($obj->getEndPaymentDate());
        self::assertNotNull($obj->getStartCreationDate());
        self::assertNotNull($obj->getEndCreationDate());
        self::assertNotNull($obj->getPage());
        self::assertNotNull($obj->getPageSize());
        self::assertNotNull($obj->getTotalCountRequired());
        self::assertNotNull($obj->getArchived());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Search $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getEmail());
        self::assertEquals("TestSample", $obj->getRecipientFirstName());
        self::assertEquals("TestSample", $obj->getRecipientLastName());
        self::assertEquals("TestSample", $obj->getRecipientBusinessName());
        self::assertEquals("TestSample", $obj->getNumber());
        self::assertEquals("TestSample", $obj->getStatus());
        self::assertEquals($obj->getLowerTotalAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getUpperTotalAmount(), CurrencyTest::getObject());
        self::assertEquals("TestSample", $obj->getStartInvoiceDate());
        self::assertEquals("TestSample", $obj->getEndInvoiceDate());
        self::assertEquals("TestSample", $obj->getStartDueDate());
        self::assertEquals("TestSample", $obj->getEndDueDate());
        self::assertEquals("TestSample", $obj->getStartPaymentDate());
        self::assertEquals("TestSample", $obj->getEndPaymentDate());
        self::assertEquals("TestSample", $obj->getStartCreationDate());
        self::assertEquals("TestSample", $obj->getEndCreationDate());
        self::assertEquals("12.34", $obj->getPage());
        self::assertEquals("12.34", $obj->getPageSize());
        self::assertEquals(true, $obj->getTotalCountRequired());
        self::assertEquals(true, $obj->getArchived());
    }
}
