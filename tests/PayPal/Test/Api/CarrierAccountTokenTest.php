<?php

namespace PayPal\Test\Api;

use PayPal\Api\CarrierAccountToken;
use PHPUnit\Framework\TestCase;

/**
 * Class CarrierAccountToken
 */
class CarrierAccountTokenTest extends TestCase
{
    /**
     * Gets Json String of Object CarrierAccountToken
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"carrier_account_id":"TestSample","external_customer_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CarrierAccountToken
     */
    public static function getObject()
    {
        return new CarrierAccountToken(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CarrierAccountToken
     */
    public function testSerializationDeserialization()
    {
        $obj = new CarrierAccountToken(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCarrierAccountId());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CarrierAccountToken $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getCarrierAccountId());
        self::assertEquals('TestSample', $obj->getExternalCustomerId());
    }
}
