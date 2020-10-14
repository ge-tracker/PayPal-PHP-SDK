<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\WebhookEventList;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookEventList
 *
 * @package PayPal\Test\Api
 */
class WebhookEventListTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookEventList
     * @return string
     */
    public static function getJson()
    {
        return '{"events":' .WebhookEventTest::getJson() . ',"count":123,"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookEventList
     */
    public static function getObject()
    {
        return new WebhookEventList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookEventList
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebhookEventList(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEvents());
        self::assertNotNull($obj->getCount());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getEvents(), WebhookEventTest::getObject());
        self::assertEquals(123, $obj->getCount());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }


}
