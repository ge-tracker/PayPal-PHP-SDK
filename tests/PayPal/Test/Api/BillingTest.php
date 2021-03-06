<?php

namespace PayPal\Test\Api;

use PayPal\Api\Billing;
use PHPUnit\Framework\TestCase;

/**
 * Class Billing
 */
class BillingTest extends TestCase
{
    /**
     * Gets Json String of Object Billing
     * @return string
     */
    public static function getJson()
    {
        return '{"billing_agreement_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Billing
     */
    public static function getObject()
    {
        return new Billing(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Billing
     */
    public function testSerializationDeserialization()
    {
        $obj = new Billing(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getBillingAgreementId());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Billing $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getBillingAgreementId());
    }
}
