<?php

namespace PayPal\Test\Api;

use PayPal\Api\TemplateSettings;
use PayPal\Common\PayPalModel;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateSettings
 */
class TemplateSettingsTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateSettings
     * @return string
     */
    public static function getJson()
    {
        return '{"field_name":"TestSample","display_preference":' . TemplateSettingsMetadataTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return TemplateSettings
     */
    public static function getObject()
    {
        return new TemplateSettings(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return TemplateSettings
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getFieldName());
        self::assertEquals($obj->getDisplayPreference(), TemplateSettingsMetadataTest::getObject());
    }
}
