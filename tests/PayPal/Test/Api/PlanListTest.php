<?php

namespace PayPal\Test\Api;

use PayPal\Api\PlanList;
use PHPUnit\Framework\TestCase;

/**
 * Class PlanList
 *
 * @package PayPal\Test\Api
 */
class PlanListTest extends TestCase
{
    /**
     * Gets Json String of Object PlanList
     * @return string
     */
    public static function getJson(): string
    {
        return '{"plans":' .PlanTest::getJson() . ',"total_items":"TestSample","total_pages":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PlanList
     */
    public static function getObject(): PlanList
    {
        return new PlanList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PlanList
     */
    public function testSerializationDeserialization(): PlanList
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getPlans(), PlanTest::getObject());
        self::assertEquals($obj->getTotalItems(), "TestSample");
        self::assertEquals($obj->getTotalPages(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
