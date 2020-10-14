<?php

namespace PayPal\Test\Api;

use PayPal\Api\Sale;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class Sale
 */
class SaleTest extends TestCase
{
    /**
     * Gets Json String of Object Sale
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","purchase_unit_reference_id":"TestSample","amount":' . AmountTest::getJson() . ',"payment_mode":"TestSample","state":"TestSample","reason_code":"TestSample","protection_eligibility":"TestSample","protection_eligibility_type":"TestSample","clearing_time":"TestSample","payment_hold_status":"TestSample","payment_hold_reasons":"TestSample","transaction_fee":' . CurrencyTest::getJson() . ',"receivable_amount":' . CurrencyTest::getJson() . ',"exchange_rate":"TestSample","fmf_details":' . FmfDetailsTest::getJson() . ',"receipt_id":"TestSample","parent_payment":"TestSample","processor_response":' . ProcessorResponseTest::getJson() . ',"billing_agreement_id":"TestSample","create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Sale
     */
    public static function getObject()
    {
        return new Sale(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Sale
     */
    public function testSerializationDeserialization()
    {
        $obj = new Sale(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getPurchaseUnitReferenceId());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getPaymentMode());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getReasonCode());
        self::assertNotNull($obj->getProtectionEligibility());
        self::assertNotNull($obj->getProtectionEligibilityType());
        self::assertNotNull($obj->getClearingTime());
        self::assertNotNull($obj->getPaymentHoldStatus());
        self::assertNotNull($obj->getPaymentHoldReasons());
        self::assertNotNull($obj->getTransactionFee());
        self::assertNotNull($obj->getReceivableAmount());
        self::assertNotNull($obj->getExchangeRate());
        self::assertNotNull($obj->getFmfDetails());
        self::assertNotNull($obj->getReceiptId());
        self::assertNotNull($obj->getParentPayment());
        self::assertNotNull($obj->getProcessorResponse());
        self::assertNotNull($obj->getBillingAgreementId());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Sale $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getPurchaseUnitReferenceId());
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals('TestSample', $obj->getPaymentMode());
        self::assertEquals('TestSample', $obj->getState());
        self::assertEquals('TestSample', $obj->getReasonCode());
        self::assertEquals('TestSample', $obj->getProtectionEligibility());
        self::assertEquals('TestSample', $obj->getProtectionEligibilityType());
        self::assertEquals('TestSample', $obj->getClearingTime());
        self::assertEquals('TestSample', $obj->getPaymentHoldStatus());
        self::assertEquals('TestSample', $obj->getPaymentHoldReasons());
        self::assertEquals($obj->getTransactionFee(), CurrencyTest::getObject());
        self::assertEquals($obj->getReceivableAmount(), CurrencyTest::getObject());
        self::assertEquals('TestSample', $obj->getExchangeRate());
        self::assertEquals($obj->getFmfDetails(), FmfDetailsTest::getObject());
        self::assertEquals('TestSample', $obj->getReceiptId());
        self::assertEquals('TestSample', $obj->getParentPayment());
        self::assertEquals($obj->getProcessorResponse(), ProcessorResponseTest::getObject());
        self::assertEquals('TestSample', $obj->getBillingAgreementId());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Sale $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get('saleId', $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     * @param Sale $obj
     */
    public function testRefund($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(RefundTest::getJson());
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

        return [
            [$obj, $mockApiContext],
            [$obj, null],
        ];
    }
}
