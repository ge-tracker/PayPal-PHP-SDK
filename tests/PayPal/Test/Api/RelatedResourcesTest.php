<?php

namespace PayPal\Test\Api;

use PayPal\Api\RelatedResources;
use PHPUnit\Framework\TestCase;

/**
 * Class RelatedResources
 *
 * @package PayPal\Test\Api
 */
class RelatedResourcesTest extends TestCase
{
    /**
     * Gets Json String of Object RelatedResources
     * @return string
     */
    public static function getJson(): string
    {
        return '{"sale":' . SaleTest::getJson() . ',"authorization":' . AuthorizationTest::getJson() . ',"order":' . OrderTest::getJson() . ',"capture":' . CaptureTest::getJson() . ',"refund":' . RefundTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RelatedResources
     */
    public static function getObject(): RelatedResources
    {
        return new RelatedResources(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return RelatedResources
     */
    public function testSerializationDeserialization(): RelatedResources
    {
        $obj = new RelatedResources(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSale());
        self::assertNotNull($obj->getAuthorization());
        self::assertNotNull($obj->getOrder());
        self::assertNotNull($obj->getCapture());
        self::assertNotNull($obj->getRefund());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param RelatedResources $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getSale(), SaleTest::getObject());
        self::assertEquals($obj->getAuthorization(), AuthorizationTest::getObject());
        self::assertEquals($obj->getOrder(), OrderTest::getObject());
        self::assertEquals($obj->getCapture(), CaptureTest::getObject());
        self::assertEquals($obj->getRefund(), RefundTest::getObject());
    }
}
