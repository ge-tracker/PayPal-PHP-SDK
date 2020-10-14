<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceItem;
use PHPUnit\Framework\TestCase;

/**
 * Class InvoiceItem
 */
class InvoiceItemTest extends TestCase
{
    /**
     * Gets Json String of Object InvoiceItem
     * @return string
     */
    public static function getJson()
    {
        return '{"name":"TestSample","description":"TestSample","quantity":"12.34","unit_price":' . CurrencyTest::getJson() . ',"tax":' . TaxTest::getJson() . ',"date":"TestSample","discount":' . CostTest::getJson() . ',"image_url":"http://www.google.com","unit_of_measure":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InvoiceItem
     */
    public static function getObject()
    {
        return new InvoiceItem(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return InvoiceItem
     */
    public function testSerializationDeserialization()
    {
        $obj = new InvoiceItem(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getQuantity());
        self::assertNotNull($obj->getUnitPrice());
        self::assertNotNull($obj->getTax());
        self::assertNotNull($obj->getDate());
        self::assertNotNull($obj->getDiscount());
        self::assertNotNull($obj->getImageUrl());
        self::assertNotNull($obj->getUnitOfMeasure());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceItem $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getDescription());
        self::assertEquals('12.34', $obj->getQuantity());
        self::assertEquals($obj->getUnitPrice(), CurrencyTest::getObject());
        self::assertEquals($obj->getTax(), TaxTest::getObject());
        self::assertEquals('TestSample', $obj->getDate());
        self::assertEquals($obj->getDiscount(), CostTest::getObject());
        self::assertEquals('http://www.google.com', $obj->getImageUrl());
        self::assertEquals('TestSample', $obj->getUnitOfMeasure());
    }

    public function testUrlValidationForImageUrl()
    {
        $this->expectExceptionMessage('ImageUrl is not a fully qualified URL');
        $this->expectException(\InvalidArgumentException::class);
        $obj = new InvoiceItem();
        $obj->setImageUrl(null);
    }
}
