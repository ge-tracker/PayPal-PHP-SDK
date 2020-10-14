<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\WebhookList;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookList
 *
 * @package PayPal\Test\Api
 */
class WebhookListTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookList
     * @return string
     */
    public static function getJson()
    {
        return '{"webhooks":' .WebhookTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookList
     */
    public static function getObject()
    {
        return new WebhookList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookList
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebhookList(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getWebhooks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookList $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getWebhooks(), WebhookTest::getObject());
    }


}
