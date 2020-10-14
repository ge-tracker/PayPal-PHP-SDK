<?php

namespace PayPal\Test\Api;

use PayPal\Api\InputFields;
use PHPUnit\Framework\TestCase;

/**
 * Class InputFields
 *
 * @package PayPal\Test\Api
 */
class InputFieldsTest extends TestCase
{
    /**
     * Gets Json String of Object InputFields
     * @return string
     */
    public static function getJson()
    {
        return '{"allow_note":true,"no_shipping":123,"address_override":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InputFields
     */
    public static function getObject()
    {
        return new InputFields(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InputFields
     */
    public function testSerializationDeserialization()
    {
        $obj = new InputFields(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAllowNote());
        self::assertNotNull($obj->getNoShipping());
        self::assertNotNull($obj->getAddressOverride());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InputFields $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals(true, $obj->getAllowNote());
        self::assertEquals(123, $obj->getNoShipping());
        self::assertEquals(123, $obj->getAddressOverride());
    }


}
