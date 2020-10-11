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
    public static function getJson(): string
    {
        return '{"email":"TestSample","recipient_first_name":"TestSample","recipient_last_name":"TestSample","recipient_business_name":"TestSample","number":"TestSample","status":"TestSample","lower_total_amount":' .CurrencyTest::getJson() . ',"upper_total_amount":' .CurrencyTest::getJson() . ',"start_invoice_date":"TestSample","end_invoice_date":"TestSample","start_due_date":"TestSample","end_due_date":"TestSample","start_payment_date":"TestSample","end_payment_date":"TestSample","start_creation_date":"TestSample","end_creation_date":"TestSample","page":"12.34","page_size":"12.34","total_count_required":true,"archived":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Search
     */
    public static function getObject(): Search
    {
        return new Search(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Search
     */
    public function testSerializationDeserialization(): Search
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getEmail(), "TestSample");
        self::assertEquals($obj->getRecipientFirstName(), "TestSample");
        self::assertEquals($obj->getRecipientLastName(), "TestSample");
        self::assertEquals($obj->getRecipientBusinessName(), "TestSample");
        self::assertEquals($obj->getNumber(), "TestSample");
        self::assertEquals($obj->getStatus(), "TestSample");
        self::assertEquals($obj->getLowerTotalAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getUpperTotalAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getStartInvoiceDate(), "TestSample");
        self::assertEquals($obj->getEndInvoiceDate(), "TestSample");
        self::assertEquals($obj->getStartDueDate(), "TestSample");
        self::assertEquals($obj->getEndDueDate(), "TestSample");
        self::assertEquals($obj->getStartPaymentDate(), "TestSample");
        self::assertEquals($obj->getEndPaymentDate(), "TestSample");
        self::assertEquals($obj->getStartCreationDate(), "TestSample");
        self::assertEquals($obj->getEndCreationDate(), "TestSample");
        self::assertEquals($obj->getPage(), "12.34");
        self::assertEquals($obj->getPageSize(), "12.34");
        self::assertEquals($obj->getTotalCountRequired(), true);
        self::assertEquals($obj->getArchived(), true);
    }
}
