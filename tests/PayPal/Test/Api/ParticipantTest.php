<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\Participant;
use PHPUnit\Framework\TestCase;

/**
 * Class Participant
 *
 * @package PayPal\Test\Api
 */
class ParticipantTest extends TestCase
{
    /**
     * Gets Json String of Object Participant
     * @return string
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","phone":' .PhoneTest::getJson() . ',"fax":' .PhoneTest::getJson() . ',"website":"TestSample","additional_info":"TestSample","address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Participant
     */
    public static function getObject(): Participant
    {
        return new Participant(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Participant
     */
    public function testSerializationDeserialization(): Participant
    {
        $obj = new Participant(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getEmail());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getBusinessName());
        self::assertNotNull($obj->getPhone());
        self::assertNotNull($obj->getFax());
        self::assertNotNull($obj->getWebsite());
        self::assertNotNull($obj->getAdditionalInfo());
        self::assertNotNull($obj->getAddress());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Participant $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getEmail(), "TestSample");
        self::assertEquals($obj->getFirstName(), "TestSample");
        self::assertEquals($obj->getLastName(), "TestSample");
        self::assertEquals($obj->getBusinessName(), "TestSample");
        self::assertEquals($obj->getPhone(), PhoneTest::getObject());
        self::assertEquals($obj->getFax(), PhoneTest::getObject());
        self::assertEquals($obj->getWebsite(), "TestSample");
        self::assertEquals($obj->getAdditionalInfo(), "TestSample");
        self::assertEquals($obj->getAddress(), AddressTest::getObject());
    }
}
