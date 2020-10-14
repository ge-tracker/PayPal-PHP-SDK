<?php

namespace PayPal\Test\Api;

use PayPal\Api\Details;
use PHPUnit\Framework\TestCase;

/**
 * Class Details
 */
class DetailsTest extends TestCase
{
    /**
     * Gets Json String of Object Details
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"subtotal":"12.34","shipping":"12.34","tax":"12.34","handling_fee":"12.34","shipping_discount":"12.34","insurance":"12.34","gift_wrap":"12.34","fee":"12.34"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Details
     */
    public static function getObject()
    {
        return new Details(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Details
     */
    public function testSerializationDeserialization()
    {
        $obj = new Details(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSubtotal());
        self::assertNotNull($obj->getShipping());
        self::assertNotNull($obj->getTax());
        self::assertNotNull($obj->getHandlingFee());
        self::assertNotNull($obj->getShippingDiscount());
        self::assertNotNull($obj->getInsurance());
        self::assertNotNull($obj->getGiftWrap());
        self::assertNotNull($obj->getFee());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Details $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('12.34', $obj->getSubtotal());
        self::assertEquals('12.34', $obj->getShipping());
        self::assertEquals('12.34', $obj->getTax());
        self::assertEquals('12.34', $obj->getHandlingFee());
        self::assertEquals('12.34', $obj->getShippingDiscount());
        self::assertEquals('12.34', $obj->getInsurance());
        self::assertEquals('12.34', $obj->getGiftWrap());
        self::assertEquals('12.34', $obj->getFee());
    }
}
