<?php

namespace PayPal\Test\Api;

use PayPal\Api\Authorization;
use PayPal\Transport\PPRestCall;
use PHPUnit\Framework\TestCase;
use PayPal\Transport\PayPalRestCall;

/**
 * Class Authorization
 *
 * @package PayPal\Test\Api
 */
class AuthorizationTest extends TestCase
{
    /**
     * Gets Json String of Object Authorization
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","amount":' .AmountTest::getJson() . ',"payment_mode":"TestSample","state":"TestSample","reason_code":"TestSample","pending_reason":"TestSample","protection_eligibility":"TestSample","protection_eligibility_type":"TestSample","fmf_details":' .FmfDetailsTest::getJson() . ',"parent_payment":"TestSample","valid_until":"TestSample","create_time":"TestSample","update_time":"TestSample","reference_id":"TestSample","receipt_id":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Authorization
     */
    public static function getObject()
    {
        return new Authorization(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Authorization
     */
    public function testSerializationDeserialization()
    {
        $obj = new Authorization(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getPaymentMode());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getReasonCode());
        self::assertNotNull($obj->getPendingReason());
        self::assertNotNull($obj->getProtectionEligibility());
        self::assertNotNull($obj->getProtectionEligibilityType());
        self::assertNotNull($obj->getFmfDetails());
        self::assertNotNull($obj->getParentPayment());
        self::assertNotNull($obj->getValidUntil());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getReferenceId());
        self::assertNotNull($obj->getReceiptId());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Authorization $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals("TestSample", $obj->getPaymentMode());
        self::assertEquals("TestSample", $obj->getState());
        self::assertEquals("TestSample", $obj->getReasonCode());
        self::assertEquals("TestSample", $obj->getPendingReason());
        self::assertEquals("TestSample", $obj->getProtectionEligibility());
        self::assertEquals("TestSample", $obj->getProtectionEligibilityType());
        self::assertEquals($obj->getFmfDetails(), FmfDetailsTest::getObject());
        self::assertEquals("TestSample", $obj->getParentPayment());
        self::assertEquals("TestSample", $obj->getValidUntil());
        self::assertEquals("TestSample", $obj->getCreateTime());
        self::assertEquals("TestSample", $obj->getUpdateTime());
        self::assertEquals("TestSample", $obj->getReferenceId());
        self::assertEquals("TestSample", $obj->getReceiptId());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Authorization $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get("authorizationId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Authorization $obj
     */
    public function testCapture($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
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
     * @param Authorization $obj
     */
    public function testVoid($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
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
     * @param Authorization $obj
     */
    public function testReauthorize($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->reauthorize($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider()
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
