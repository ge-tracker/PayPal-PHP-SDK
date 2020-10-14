<?php

namespace PayPal\Test\Api;

use PayPal\Api\Refund;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class Refund
 */
class RefundTest extends TestCase
{
    /**
     * Gets Json String of Object Refund
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","amount":' . AmountTest::getJson() . ',"state":"TestSample","reason":"TestSample","invoice_number":"TestSample","sale_id":"TestSample","capture_id":"TestSample","parent_payment":"TestSample","description":"TestSample","create_time":"TestSample","update_time":"TestSample","reason_code":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Refund
     */
    public static function getObject()
    {
        return new Refund(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Refund
     */
    public function testSerializationDeserialization()
    {
        $obj = new Refund(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getReason());
        self::assertNotNull($obj->getInvoiceNumber());
        self::assertNotNull($obj->getSaleId());
        self::assertNotNull($obj->getCaptureId());
        self::assertNotNull($obj->getParentPayment());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getReasonCode());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Refund $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals('TestSample', $obj->getState());
        self::assertEquals('TestSample', $obj->getReason());
        self::assertEquals('TestSample', $obj->getInvoiceNumber());
        self::assertEquals('TestSample', $obj->getSaleId());
        self::assertEquals('TestSample', $obj->getCaptureId());
        self::assertEquals('TestSample', $obj->getParentPayment());
        self::assertEquals('TestSample', $obj->getDescription());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
        self::assertEquals('TestSample', $obj->getReasonCode());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Refund $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get('refundId', $mockApiContext, $mockPPRestCall);
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
