<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\TemplateSettings;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateSettings
 *
 * @package PayPal\Test\Api
 */
class TemplateSettingsTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateSettings
     * @return string
     */
    public static function getJson(): string
    {
        return '{"field_name":"TestSample","display_preference":' .TemplateSettingsMetadataTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return TemplateSettings
     */
    public static function getObject(): TemplateSettings
    {
        return new TemplateSettings(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return TemplateSettings
     */
    public function testSerializationDeserialization(): TemplateSettings
    {
        $obj = new TemplateSettings(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getFieldName());
        self::assertNotNull($obj->getDisplayPreference());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param TemplateSettings $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getFieldName(), "TestSample");
        self::assertEquals($obj->getDisplayPreference(), TemplateSettingsMetadataTest::getObject());
    }
}
