<?php

namespace PayPal\Test\Api;

use PayPal\Api\InstallmentInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class InstallmentInfo
 */
class InstallmentInfoTest extends TestCase
{
    /**
     * Gets Json String of Object InstallmentInfo
     * @return string
     */
    public static function getJson()
    {
        return '{"installment_id":"TestSample","network":"TestSample","issuer":"TestSample","installment_options":' . InstallmentOptionTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InstallmentInfo
     */
    public static function getObject()
    {
        return new InstallmentInfo(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return InstallmentInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new InstallmentInfo(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getInstallmentId());
        self::assertNotNull($obj->getNetwork());
        self::assertNotNull($obj->getIssuer());
        self::assertNotNull($obj->getInstallmentOptions());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InstallmentInfo $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getInstallmentId());
        self::assertEquals('TestSample', $obj->getNetwork());
        self::assertEquals('TestSample', $obj->getIssuer());
        self::assertEquals($obj->getInstallmentOptions(), InstallmentOptionTest::getObject());
    }
}
