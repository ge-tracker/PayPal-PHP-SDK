<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreditCardList;
use PHPUnit\Framework\TestCase;

/**
 * Class CreditCardList
 */
class CreditCardListTest extends TestCase
{
    /**
     * Gets Json String of Object CreditCardList
     * @return string
     */
    public static function getJson()
    {
        return '{"items":' . CreditCardTest::getJson() . ',"links":' . LinksTest::getJson() . ',"total_items":123,"total_pages":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditCardList
     */
    public static function getObject()
    {
        return new CreditCardList(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreditCardList
     */
    public function testSerializationDeserialization()
    {
        $obj = new CreditCardList(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getItems());
        self::assertNotNull($obj->getLinks());
        self::assertNotNull($obj->getTotalItems());
        self::assertNotNull($obj->getTotalPages());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreditCardList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getItems(), CreditCardTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
        self::assertEquals(123, $obj->getTotalItems());
        self::assertEquals(123, $obj->getTotalPages());
    }
}
