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
    public static function getJson()
    {
        return '{"id":"TestSample","amount":' .AmountTest::getJson() . ',"is_final_capture":true,"state":"TestSample","reason_code":"TestSample","parent_payment":"TestSample","invoice_number":"TestSample","transaction_fee":' .CurrencyTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Capture
     */
    public static function getObject()
    {
        return new Capture(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Capture
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals(true, $obj->getIsFinalCapture());
        self::assertEquals("TestSample", $obj->getState());
        self::assertEquals("TestSample", $obj->getReasonCode());
        self::assertEquals("TestSample", $obj->getParentPayment());
        self::assertEquals("TestSample", $obj->getInvoiceNumber());
        self::assertEquals($obj->getTransactionFee(), CurrencyTest::getObject());
        self::assertEquals("TestSample", $obj->getCreateTime());
        self::assertEquals("TestSample", $obj->getUpdateTime());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Capture $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->get("captureId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Capture $obj
     */
    public function testRefund($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                RefundTest::getJson()
            ));
        $refund = RefundTest::getObject();

        $result = $obj->refund($refund, $mockApiContext, $mockPPRestCall);
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
