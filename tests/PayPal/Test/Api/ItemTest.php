<?php

namespace PayPal\Test\Api;

use PayPal\Api\Item;
use PHPUnit\Framework\TestCase;

/**
 * Class Item
 */
class ItemTest extends TestCase
{
    /**
     * Gets Json String of Object Item
     * @return string
     */
    public static function getJson()
    {
        return '{"sku":"TestSample","name":"TestSample","description":"TestSample","quantity":"12.34","price":"12.34","currency":"TestSample","tax":"12.34","url":"http://www.google.com","category":"TestSample","weight":' . MeasurementTest::getJson() . ',"length":' . MeasurementTest::getJson() . ',"height":' . MeasurementTest::getJson() . ',"width":' . MeasurementTest::getJson() . ',"supplementary_data":' . NameValuePairTest::getJson() . ',"postback_data":' . NameValuePairTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Item
     */
    public static function getObject()
    {
        return new Item(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Item
     */
    public function testSerializationDeserialization()
    {
        $obj = new Item(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSku());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getQuantity());
        self::assertNotNull($obj->getPrice());
        self::assertNotNull($obj->getCurrency());
        self::assertNotNull($obj->getTax());
        self::assertNotNull($obj->getUrl());
        self::assertNotNull($obj->getCategory());
        self::assertNotNull($obj->getWeight());
        self::assertNotNull($obj->getLength());
        self::assertNotNull($obj->getHeight());
        self::assertNotNull($obj->getWidth());
        self::assertNotNull($obj->getSupplementaryData());
        self::assertNotNull($obj->getPostbackData());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Item $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getSku());
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getDescription());
        self::assertEquals('12.34', $obj->getQuantity());
        self::assertEquals('12.34', $obj->getPrice());
        self::assertEquals('TestSample', $obj->getCurrency());
        self::assertEquals('12.34', $obj->getTax());
        self::assertEquals('http://www.google.com', $obj->getUrl());
        self::assertEquals('TestSample', $obj->getCategory());
        self::assertEquals($obj->getWeight(), MeasurementTest::getObject());
        self::assertEquals($obj->getLength(), MeasurementTest::getObject());
        self::assertEquals($obj->getHeight(), MeasurementTest::getObject());
        self::assertEquals($obj->getWidth(), MeasurementTest::getObject());
        self::assertEquals($obj->getSupplementaryData(), NameValuePairTest::getObject());
        self::assertEquals($obj->getPostbackData(), NameValuePairTest::getObject());
    }

    public function testUrlValidationForUrl()
    {
        $this->expectExceptionMessage('Url is not a fully qualified URL');
        $this->expectException(\InvalidArgumentException::class);
        $obj = new Item();
        $obj->setUrl(null);
    }
}
