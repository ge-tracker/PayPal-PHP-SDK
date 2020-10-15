<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriptionBillingInfo;
use PayPal\Test\Api\CurrencyRestTest;
use PayPal\Test\Api\CycleExecutionsTest;
use PayPal\Test\Api\LastPaymentTest;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionBillingInfo
 */
class SubscriptionBillingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"outstanding_balance":' . CurrencyRestTest::getJson() . ',"cycle_executions":' . CycleExecutionsTest::getJson() . ',"last_payment":' . LastPaymentTest::getJson() . ',"next_billing_time":"TestSample","failed_payments_count":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriptionBillingInfo
     */
    public static function getObject()
    {
        return new SubscriptionBillingInfo(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriptionBillingInfo
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriptionBillingInfo(self::getJson());
        self::assertNotNull($obj->getOutstandingBalance());
        self::assertNotNull($obj->getCycleExecutions());
        self::assertNotNull($obj->getLastPayment());
        self::assertNotNull($obj->getNextBillingTime());
        self::assertNotNull($obj->getFailedPaymentsCount());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriptionBillingInfo $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getOutstandingBalance(), CurrencyRestTest::getObject());
        self::assertEquals($obj->getCycleExecutions(), CycleExecutionsTest::getObject());
        self::assertEquals($obj->getLastPayment(), LastPaymentTest::getObject());
        self::assertEquals('TestSample', $obj->getNextBillingTime());
        self::assertEquals('TestSample', $obj->getFailedPaymentsCount());
    }
}
