<?php

namespace PayPal\Test\Api;

use PayPal\Api\Credit;
use PHPUnit\Framework\TestCase;

/**
 * Class Credit
 *
 * @package PayPal\Test\Api
 */
class CreditTest extends TestCase
{
    /**
     * Gets Json String of Object Credit
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Credit
     */
    public static function getObject(): Credit
    {
        return new Credit(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Credit
     */
    public function testSerializationDeserialization(): Credit
    {
        $obj = new Credit(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getType());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Credit $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
    }
}
