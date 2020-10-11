<?php

namespace PayPal\Test\Api;

use PayPal\Api\CarrierAccountToken;
use PHPUnit\Framework\TestCase;

/**
 * Class CarrierAccountToken
 *
 * @package PayPal\Test\Api
 */
class CarrierAccountTokenTest extends TestCase
{
    /**
     * Gets Json String of Object CarrierAccountToken
     *
     * @return string
     */
    public static function getJson(): string
    {
        return '{"carrier_account_id":"TestSample","external_customer_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CarrierAccountToken
     */
    public static function getObject(): CarrierAccountToken
    {
        return new CarrierAccountToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CarrierAccountToken
     */
    public function testSerializationDeserialization(): CarrierAccountToken
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getCarrierAccountId(), "TestSample");
        self::assertEquals($obj->getExternalCustomerId(), "TestSample");
    }
}
