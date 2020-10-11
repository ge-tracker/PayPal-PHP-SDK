<?php

namespace PayPal\Test\Api;

use PayPal\Api\InstallmentInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class InstallmentInfo
 *
 * @package PayPal\Test\Api
 */
class InstallmentInfoTest extends TestCase
{
    /**
     * Gets Json String of Object InstallmentInfo
     * @return string
     */
    public static function getJson(): string
    {
        return '{"installment_id":"TestSample","network":"TestSample","issuer":"TestSample","installment_options":' . InstallmentOptionTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InstallmentInfo
     */
    public static function getObject(): InstallmentInfo
    {
        return new InstallmentInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InstallmentInfo
     */
    public function testSerializationDeserialization(): InstallmentInfo
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getInstallmentId(), "TestSample");
        self::assertEquals($obj->getNetwork(), "TestSample");
        self::assertEquals($obj->getIssuer(), "TestSample");
        self::assertEquals($obj->getInstallmentOptions(), InstallmentOptionTest::getObject());
    }
}
