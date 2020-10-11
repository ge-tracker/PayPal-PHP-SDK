<?php

namespace PayPal\Test\Api;

use PayPal\Api\Capture;
use PayPal\Transport\PPRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class Capture
 *
 * @package PayPal\Test\Api
 */
class CaptureTest extends TestCase
{
    /**
     * Gets Json String of Object Capture
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","amount":' .AmountTest::getJson() . ',"is_final_capture":true,"state":"TestSample","reason_code":"TestSample","parent_payment":"TestSample","invoice_number":"TestSample","transaction_fee":' .CurrencyTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Capture
     */
    public static function getObject(): Capture
    {
        return new Capture(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Capture
     */
    public function testSerializationDeserialization(): Capture
    {
        $obj = new Capture(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getIsFinalCapture());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getReasonCode());
        self::assertNotNull($obj->getParentPayment());
        self::assertNotNull($obj->getInvoiceNumber());
        self::assertNotNull($obj->getTransactionFee());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Capture $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals($obj->getIsFinalCapture(), true);
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getReasonCode(), "TestSample");
        self::assertEquals($obj->getParentPayment(), "TestSample");
        self::assertEquals($obj->getInvoiceNumber(), "TestSample");
        self::assertEquals($obj->getTransactionFee(), CurrencyTest::getObject());
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Capture $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(CaptureTest::getJson());

        $result = $obj->get("captureId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Capture $obj
     */
    public function testRefund($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(RefundTest::getJson());
        $refund = RefundTest::getObject();

        $result = $obj->refund($refund, $mockApiContext, $mockPPRestCall);
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
