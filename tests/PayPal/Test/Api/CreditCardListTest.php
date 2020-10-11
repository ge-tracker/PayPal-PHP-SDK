<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreditCardList;
use PHPUnit\Framework\TestCase;

/**
 * Class CreditCardList
 *
 * @package PayPal\Test\Api
 */
class CreditCardListTest extends TestCase
{
    /**
     * Gets Json String of Object CreditCardList
     * @return string
     */
    public static function getJson(): string
    {
        return '{"items":' .CreditCardTest::getJson() . ',"links":' .LinksTest::getJson() . ',"total_items":123,"total_pages":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CreditCardList
     */
    public static function getObject(): CreditCardList
    {
        return new CreditCardList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CreditCardList
     */
    public function testSerializationDeserialization(): CreditCardList
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getItems(), CreditCardTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
        self::assertEquals($obj->getTotalItems(), 123);
        self::assertEquals($obj->getTotalPages(), 123);
    }
}
