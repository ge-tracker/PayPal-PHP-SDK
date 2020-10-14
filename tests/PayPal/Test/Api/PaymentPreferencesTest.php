<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentPreferences;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentDefinition
 */
class PaymentPreferencesTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"service_type":"TestSample","auto_bill_outstanding":true,"setup_fee":' . CurrencyRestTest::getJson() . ',"setup_fee_failure_action":"CONTINUE","payment_failure_threshold":1}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return PaymentPreferences
     */
    public static function getObject()
    {
        return new PaymentPreferences(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return PaymentPreferences
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentPreferences(self::getJson());

        self::assertNotNull($obj);
        self::assertNotNull($obj->getServiceType());
        self::assertNotNull($obj->getAutoBillOutstanding());
        self::assertNotNull($obj->getSetupFee());
        self::assertNotNull($obj->getSetupFeeFailureAction());
        self::assertNotNull($obj->getPaymentFailureThreshold());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param PaymentPreferences $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getServiceType());
        self::assertTrue($obj->getAutoBillOutstanding());
        self::assertEquals('CONTINUE', $obj->getSetupFeeFailureAction());
        self::assertEquals('1', $obj->getPaymentFailureThreshold());
        self::assertEquals($obj->getSetupFee(), CurrencyRestTest::getObject());
    }
}
