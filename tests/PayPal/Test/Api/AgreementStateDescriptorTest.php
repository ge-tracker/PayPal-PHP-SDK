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
    public static function getJson(): string
    {
        return '{"note":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return AgreementStateDescriptor
     */
    public static function getObject(): AgreementStateDescriptor
    {
        return new AgreementStateDescriptor(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return AgreementStateDescriptor
     */
    public function testSerializationDeserialization(): AgreementStateDescriptor
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}
