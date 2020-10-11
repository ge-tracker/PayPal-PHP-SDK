<?php

namespace PayPal\Test\Api;

use PayPal\Api\Incentive;
use PHPUnit\Framework\TestCase;

/**
 * Class Incentive
 *
 * @package PayPal\Test\Api
 */
class IncentiveTest extends TestCase
{
    /**
     * Gets Json String of Object Incentive
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","code":"TestSample","name":"TestSample","description":"TestSample","minimum_purchase_amount":' . CurrencyTest::getJson() . ',"logo_image_url":"http://www.google.com","expiry_date":"TestSample","type":"TestSample","terms":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Incentive
     */
    public static function getObject(): Incentive
    {
        return new Incentive(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Incentive
     */
    public function testSerializationDeserialization(): Incentive
    {
        $obj = new Incentive(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getCode());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getMinimumPurchaseAmount());
        self::assertNotNull($obj->getLogoImageUrl());
        self::assertNotNull($obj->getExpiryDate());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getTerms());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Incentive $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getCode(), "TestSample");
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getDescription(), "TestSample");
        self::assertEquals($obj->getMinimumPurchaseAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getLogoImageUrl(), "http://www.google.com");
        self::assertEquals($obj->getExpiryDate(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getTerms(), "TestSample");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage LogoImageUrl is not a fully qualified URL
     */
    public function testUrlValidationForLogoImageUrl(): void
    {
        $obj = new Incentive();
        $obj->setLogoImageUrl(null);
    }
}
