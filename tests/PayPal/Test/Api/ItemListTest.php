<?php

namespace PayPal\Test\Api;

use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PHPUnit\Framework\TestCase;

/**
 * Class ItemList
 */
class ItemListTest extends TestCase
{
    /**
     * Gets Json String of Object ItemList
     * @return string
     */
    public static function getJson()
    {
        return '{"items":[' . ItemTest::getJson() . '],"shipping_address":' . ShippingAddressTest::getJson() . ',"shipping_method":"TestSample","shipping_phone_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return ItemList
     */
    public static function getObject()
    {
        return new ItemList(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return ItemList
     */
    public function testSerializationDeserialization()
    {
        $obj = new ItemList(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getItems());
        self::assertNotNull($obj->getShippingAddress());
        self::assertNotNull($obj->getShippingMethod());
        self::assertNotNull($obj->getShippingPhoneNumber());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ItemList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getItems(), [ItemTest::getObject()]);
        self::assertEquals($obj->getShippingAddress(), ShippingAddressTest::getObject());
        self::assertEquals('TestSample', $obj->getShippingMethod());
        self::assertEquals('TestSample', $obj->getShippingPhoneNumber());
    }

    /**
     * @depends testSerializationDeserialization
     * @param ItemList $obj
     */
    public function testAddRemove($obj)
    {
        $item2 = new Item(ItemTest::getJSON());
        $item2->setSku('TestSample2');
        $item3 = new Item(ItemTest::getJSON());
        $item3->setSku('TestSample3');
        $obj->addItem($item2);
        $obj->addItem($item3);
        self::assertCount(3, $obj->getItems());
        $obj->removeItem($item2);

        self::assertCount(2, $obj->getItems());
        self::assertStringContainsString('"items":[', $obj->toJSON());
    }
}
