<?php

namespace PayPal\Test\Api;

use PayPal\Api\Presentation;
use PHPUnit\Framework\TestCase;

/**
 * Class Presentation
 */
class PresentationTest extends TestCase
{
    /**
     * Gets Json String of Object Presentation
     * @return string
     */
    public static function getJson()
    {
        return '{"brand_name":"TestSample","logo_image":"TestSample","locale_code":"TestSample","return_url_label":"TestSample","note_to_seller_label":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Presentation
     */
    public static function getObject()
    {
        return new Presentation(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Presentation
     */
    public function testSerializationDeserialization()
    {
        $obj = new Presentation(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getBrandName());
        self::assertNotNull($obj->getLogoImage());
        self::assertNotNull($obj->getLocaleCode());
        self::assertNotNull($obj->getReturnUrlLabel());
        self::assertNotNull($obj->getNoteToSellerLabel());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Presentation $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getBrandName());
        self::assertEquals('TestSample', $obj->getLogoImage());
        self::assertEquals('TestSample', $obj->getLocaleCode());
        self::assertEquals('TestSample', $obj->getReturnUrlLabel());
        self::assertEquals('TestSample', $obj->getNoteToSellerLabel());
    }
}
