<?php

namespace PayPal\Test\Api;

use PayPal\Api\PrivateLabelCard;
use PHPUnit\Framework\TestCase;

/**
 * Class PrivateLabelCard
 *
 * @package PayPal\Test\Api
 */
class PrivateLabelCardTest extends TestCase
{
    /**
     * Gets Json String of Object PrivateLabelCard
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","card_number":"TestSample","issuer_id":"TestSample","issuer_name":"TestSample","image_key":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PrivateLabelCard
     */
    public static function getObject()
    {
        return new PrivateLabelCard(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PrivateLabelCard
     */
    public function testSerializationDeserialization()
    {
        $obj = new PrivateLabelCard(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getCardNumber());
        self::assertNotNull($obj->getIssuerId());
        self::assertNotNull($obj->getIssuerName());
        self::assertNotNull($obj->getImageKey());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PrivateLabelCard $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals("TestSample", $obj->getCardNumber());
        self::assertEquals("TestSample", $obj->getIssuerId());
        self::assertEquals("TestSample", $obj->getIssuerName());
        self::assertEquals("TestSample", $obj->getImageKey());
    }
}
