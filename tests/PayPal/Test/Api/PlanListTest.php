<?php

namespace PayPal\Test\Api;

use PayPal\Api\PlanList;
use PHPUnit\Framework\TestCase;

/**
 * Class PlanList
 */
class PlanListTest extends TestCase
{
    /**
     * Gets Json String of Object PlanList
     * @return string
     */
    public static function getJson()
    {
        return '{"plans":' . PlanTest::getJson() . ',"total_items":"TestSample","total_pages":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PlanList
     */
    public static function getObject()
    {
        return new PlanList(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PlanList
     */
    public function testSerializationDeserialization()
    {
        $obj = new PlanList(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getPlans());
        self::assertNotNull($obj->getTotalItems());
        self::assertNotNull($obj->getTotalPages());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PlanList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getPlans(), PlanTest::getObject());
        self::assertEquals('TestSample', $obj->getTotalItems());
        self::assertEquals('TestSample', $obj->getTotalPages());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
