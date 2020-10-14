<?php

namespace PayPal\Test\Api;

use PayPal\Api\SubscriptionPlan;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class SubscriptionPlan
 */
class SubscriptionPlanTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","product_id":"TestSample","name":"TestSample","status":"TestSample","description":"TestSample","usage_type":"TestSample","billing_cycles":[' . BillingCyclesTest::getJson() . '],"payment_preferences":' . PaymentPreferencesTest::getJson() . ',"quantity_supported":false,"create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return SubscriptionPlan
     */
    public static function getObject()
    {
        return new SubscriptionPlan(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return SubscriptionPlan
     */
    public function testSerializationDeserialization()
    {
        $obj = new SubscriptionPlan(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getProductId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getUsageType());
        self::assertNotNull($obj->getBillingCycles());
        self::assertNotNull($obj->getPaymentPreferences());
        self::assertNotNull($obj->getQuantitySupported());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param SubscriptionPlan $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getProductId());
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getStatus());
        self::assertEquals('TestSample', $obj->getDescription());
        self::assertEquals('TestSample', $obj->getUsageType());
        self::assertFalse($obj->getQuantitySupported());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
        self::assertEquals($obj->getBillingCycles(), [BillingCyclesTest::getObject()]);
        self::assertEquals($obj->getPaymentPreferences(), PaymentDefinitionTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     *
     * @param SubscriptionPlan $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get('planId', $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param SubscriptionPlan $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->create($mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param SubscriptionPlan $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param SubscriptionPlan $obj
     */
    public function testList($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PlanListTest::getJson());

        $result = $obj->all([], $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider()
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
            ->disableOriginalConstructor()
            ->getMock();

        return [
            [$obj, $mockApiContext],
            [$obj, null],
        ];
    }
}
