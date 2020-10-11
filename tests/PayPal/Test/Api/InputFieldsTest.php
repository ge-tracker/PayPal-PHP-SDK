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
    public static function getJson(): string
    {
        return '{"allow_note":true,"no_shipping":123,"address_override":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return InputFields
     */
    public static function getObject(): InputFields
    {
        return new InputFields(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return InputFields
     */
    public function testSerializationDeserialization(): InputFields
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getAllowNote(), true);
        self::assertEquals($obj->getNoShipping(), 123);
        self::assertEquals($obj->getAddressOverride(), 123);
    }


}
