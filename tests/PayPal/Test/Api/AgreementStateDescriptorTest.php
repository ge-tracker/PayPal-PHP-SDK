<?php

namespace PayPal\Test\Api;

use PayPal\Api\AgreementStateDescriptor;
use PHPUnit\Framework\TestCase;

/**
 * Class AgreementStateDescriptor
 *
 * @package PayPal\Test\Api
 */
class AgreementStateDescriptorTest extends TestCase
{
    /**
     * Gets Json String of Object AgreementStateDescriptor
     * @return string
     */
    public static function getJson()
    {
        return '{"note":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return AgreementStateDescriptor
     */
    public static function getObject()
    {
        return new AgreementStateDescriptor(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return AgreementStateDescriptor
     */
    public function testSerializationDeserialization()
    {
        $obj = new AgreementStateDescriptor(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getAmount());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementStateDescriptor $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getNote());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
