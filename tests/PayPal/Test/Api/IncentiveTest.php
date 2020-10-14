<?php

namespace PayPal\Test\Api;

use PayPal\Api\Incentive;
use PHPUnit\Framework\TestCase;

/**
 * Class Incentive
 */
class IncentiveTest extends TestCase
{
    /**
     * Gets Json String of Object Incentive
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","code":"TestSample","name":"TestSample","description":"TestSample","minimum_purchase_amount":' . CurrencyTest::getJson() . ',"logo_image_url":"http://www.google.com","expiry_date":"TestSample","type":"TestSample","terms":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Incentive
     */
    public static function getObject()
    {
        return new Incentive(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Incentive
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getCode());
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getDescription());
        self::assertEquals($obj->getMinimumPurchaseAmount(), CurrencyTest::getObject());
        self::assertEquals('http://www.google.com', $obj->getLogoImageUrl());
        self::assertEquals('TestSample', $obj->getExpiryDate());
        self::assertEquals('TestSample', $obj->getType());
        self::assertEquals('TestSample', $obj->getTerms());
    }

    public function testUrlValidationForLogoImageUrl()
    {
        $this->expectExceptionMessage('LogoImageUrl is not a fully qualified URL');
        $this->expectException(\InvalidArgumentException::class);
        $obj = new Incentive();
        $obj->setLogoImageUrl(null);
    }
}
