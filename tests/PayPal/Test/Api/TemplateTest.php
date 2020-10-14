<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\Template;
use PHPUnit\Framework\TestCase;

/**
 * Class Template
 *
 * @package PayPal\Test\Api
 */
class TemplateTest extends TestCase
{
    /**
     * Gets Json String of Object Template
     * @return string
     */
    public static function getJson()
    {
        return '{"template_id":"TestSample","name":"TestSample","default":true,"template_data":' .TemplateDataTest::getJson() . ',"settings":' .TemplateSettingsTest::getJson() . ',"unit_of_measure":"TestSample","custom":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Template
     */
    public static function getObject()
    {
        return new Template(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Template
     */
    public function testSerializationDeserialization()
    {
        $obj = new Template(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getTemplateId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDefault());
        self::assertNotNull($obj->getTemplateData());
        self::assertNotNull($obj->getSettings());
        self::assertNotNull($obj->getUnitOfMeasure());
        self::assertNotNull($obj->getCustom());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Template $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getTemplateId());
        self::assertEquals("TestSample", $obj->getName());
        self::assertEquals(true, $obj->getDefault());
        self::assertEquals($obj->getTemplateData(), TemplateDataTest::getObject());
        self::assertEquals($obj->getSettings(), TemplateSettingsTest::getObject());
        self::assertEquals("TestSample", $obj->getUnitOfMeasure());
        self::assertEquals(true, $obj->getCustom());
    }
}
