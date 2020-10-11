<?php

namespace PayPal\Test\Api;

use PayPal\Api\Authorization;
use PayPal\Api\Order;
use PHPUnit\Framework\TestCase;

/**
 * Class Order
 *
 * @package PayPal\Test\Api
 */
class OrderTest extends TestCase
{
    /**
     * Gets Json String of Object Order
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","reference_id":"TestSample","amount":' .AmountTest::getJson() . ',"payment_mode":"TestSample","state":"TestSample","reason_code":"TestSample","pending_reason":"TestSample","protection_eligibility":"TestSample","protection_eligibility_type":"TestSample","parent_payment":"TestSample","fmf_details":' .FmfDetailsTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Order
     */
    public static function getObject(): Order
    {
        return new Order(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Order
     */
    public function testSerializationDeserialization(): Order
    {
        $obj = new Order(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getReferenceId());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getPaymentMode());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getReasonCode());
        self::assertNotNull($obj->getPendingReason());
        self::assertNotNull($obj->getProtectionEligibility());
        self::assertNotNull($obj->getProtectionEligibilityType());
        self::assertNotNull($obj->getParentPayment());
        self::assertNotNull($obj->getFmfDetails());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Order $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getReferenceId(), "TestSample");
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals($obj->getPaymentMode(), "TestSample");
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getReasonCode(), "TestSample");
        self::assertEquals($obj->getPendingReason(), "TestSample");
        self::assertEquals($obj->getProtectionEligibility(), "TestSample");
        self::assertEquals($obj->getProtectionEligibilityType(), "TestSample");
        self::assertEquals($obj->getParentPayment(), "TestSample");
        self::assertEquals($obj->getFmfDetails(), FmfDetailsTest::getObject());
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Order $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(OrderTest::getJson());

        $result = $obj->get("orderId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Order $obj
     */
    public function testCapture($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(CaptureTest::getJson());
        $capture = CaptureTest::getObject();

        $result = $obj->capture($capture, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Order $obj
     */
    public function testVoid($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->void($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Order $obj
     */
    public function testAuthorize($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(AuthorizationTest::getJson());

        $authorization = new Authorization();
        $result = $obj->authorize($authorization, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider(): array
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();
        return array(
            array($obj, $mockApiContext),
            array($obj, null)
        );
    }
}
