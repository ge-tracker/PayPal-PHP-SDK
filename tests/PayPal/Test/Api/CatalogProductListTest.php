<?php

namespace PayPal\Test\Api;

use PayPal\Api\CatalogProductList;
use PHPUnit\Framework\TestCase;

/**
 * Class CatalogProductList
 */
class CatalogProductListTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"total_items":"TestSample","total_pages":"TestSample","products":' . CatalogProductTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CatalogProductList
     */
    public static function getObject()
    {
        return new CatalogProductList(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CatalogProductList
     */
    public function testSerializationDeserialization()
    {
        $obj = new CatalogProductList(self::getJson());
        self::assertNotNull($obj->getTotalItems());
        self::assertNotNull($obj->getTotalPages());
        self::assertNotNull($obj->getProducts());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param CatalogProductList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getTotalItems());
        self::assertEquals('TestSample', $obj->getTotalPages());
        self::assertEquals($obj->getProducts(), CatalogProductTest::getObject());
    }
}
