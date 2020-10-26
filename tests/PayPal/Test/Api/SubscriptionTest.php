<?php

namespace PayPal\Test\Api;

use PayPal\Api\Subscription;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class Subscription
 */
class SubscriptionTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","plan_id":"TestSample","start_time":"TestSample","quantity":"TestSample","shipping_amount":' . CurrencyRestTest::getJson() . ',"subscriber":' . SubscriberTest::getJson() . ',"billing_info":' . SubscriptionBillingInfoTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample","status":"TestSample","status_update_time":"TestSample","custom_id":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return Subscription
     */
    public static function getObject()
    {
        return new Subscription(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return Subscription
     */
    public function testSerializationDeserialization()
    {
        $obj = new Subscription(self::getJson());
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getPlanId());
        self::assertNotNull($obj->getStartTime());
        self::assertNotNull($obj->getQuantity());
        self::assertNotNull($obj->getShippingAmount());
        self::assertNotNull($obj->getSubscriber());
        self::assertNotNull($obj->getBillingInfo());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getStatusUpdateTime());
        self::assertNotNull($obj->getCustomId());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param Subscription $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getPlanId());
        self::assertEquals('TestSample', $obj->getStartTime());
        self::assertEquals('TestSample', $obj->getQuantity());
        self::assertEquals($obj->getShippingAmount(), CurrencyRestTest::getObject());
        self::assertEquals($obj->getSubscriber(), SubscriberTest::getObject());
        self::assertEquals($obj->getBillingInfo(), SubscriptionBillingInfoTest::getObject());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
        self::assertEquals('TestSample', $obj->getStatus());
        self::assertEquals('TestSample', $obj->getStatusUpdateTime());
        self::assertEquals('TestSample', $obj->getCustomId());
    }

    /**
     * @dataProvider mockProvider
     *
     * @param Subscription $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get('subscriptionId', $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param Subscription $obj
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
     * @param Subscription $obj
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
     * @param Subscription $obj
     */
    public function testActivate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);

        $result = $obj->activate(['reason' => 'TestSample'], $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param Subscription $obj
     */
    public function testSuspend($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);

        $result = $obj->suspend(['reason' => 'TestSample'], $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param Subscription $obj
     */
    public function testCancel($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);

        $result = $obj->cancel(['reason' => 'TestSample'], $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param Subscription $obj
     */
    public function testTransactions($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(SubscriptionListTest::getJson());

        $result = $obj->transactions('2020-01-21T07:50:20.940Z', '2020-01-28T07:50:20.940Z', $mockApiContext, $mockPayPalRestCall);
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
