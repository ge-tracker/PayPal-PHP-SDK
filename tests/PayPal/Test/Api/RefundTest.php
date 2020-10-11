<?php

namespace PayPal\Test\Api;

use PayPal\Api\Refund;
use PHPUnit\Framework\TestCase;

/**
 * Class Refund
 *
 * @package PayPal\Test\Api
 */
class RefundTest extends TestCase
{
    /**
     * Gets Json String of Object Refund
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","amount":' .AmountTest::getJson() . ',"state":"TestSample","reason":"TestSample","invoice_number":"TestSample","sale_id":"TestSample","capture_id":"TestSample","parent_payment":"TestSample","description":"TestSample","create_time":"TestSample","update_time":"TestSample","reason_code":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Refund
     */
    public static function getObject(): Refund
    {
        return new Refund(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Refund
     */
    public function testSerializationDeserialization(): Refund
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getReason(), "TestSample");
        self::assertEquals($obj->getInvoiceNumber(), "TestSample");
        self::assertEquals($obj->getSaleId(), "TestSample");
        self::assertEquals($obj->getCaptureId(), "TestSample");
        self::assertEquals($obj->getParentPayment(), "TestSample");
        self::assertEquals($obj->getDescription(), "TestSample");
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getReasonCode(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Refund $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(RefundTest::getJson());

        $result = $obj->get("refundId", $mockApiContext, $mockPPRestCall);
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
