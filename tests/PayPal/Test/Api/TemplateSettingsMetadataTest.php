<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\TemplateSettingsMetadata;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateSettingsMetadata
 *
 * @package PayPal\Test\Api
 */
class TemplateSettingsMetadataTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateSettingsMetadata
     * @return string
     */
    public static function getJson()
    {
        return '{"hidden":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return TemplateSettingsMetadata
     */
    public static function getObject()
    {
        return new TemplateSettingsMetadata(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return TemplateSettingsMetadata
     */
    public function testSerializationDeserialization()
    {
        $obj = new TemplateSettingsMetadata(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getHidden());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param TemplateSettingsMetadata $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals(true, $obj->getHidden());
    }
}
