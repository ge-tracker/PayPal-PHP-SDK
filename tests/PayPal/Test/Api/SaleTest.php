<?php

namespace PayPal\Test\Api;

use PayPal\Api\Sale;
use PHPUnit\Framework\TestCase;

/**
 * Class Sale
 *
 * @package PayPal\Test\Api
 */
class SaleTest extends TestCase
{
    /**
     * Gets Json String of Object Sale
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","purchase_unit_reference_id":"TestSample","amount":' . AmountTest::getJson() . ',"payment_mode":"TestSample","state":"TestSample","reason_code":"TestSample","protection_eligibility":"TestSample","protection_eligibility_type":"TestSample","clearing_time":"TestSample","payment_hold_status":"TestSample","payment_hold_reasons":"TestSample","transaction_fee":' . CurrencyTest::getJson() . ',"receivable_amount":' . CurrencyTest::getJson() . ',"exchange_rate":"TestSample","fmf_details":' . FmfDetailsTest::getJson() . ',"receipt_id":"TestSample","parent_payment":"TestSample","processor_response":' . ProcessorResponseTest::getJson() . ',"billing_agreement_id":"TestSample","create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Sale
     */
    public static function getObject(): Sale
    {
        return new Sale(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Sale
     */
    public function testSerializationDeserialization(): Sale
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getPurchaseUnitReferenceId(), "TestSample");
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals($obj->getPaymentMode(), "TestSample");
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getReasonCode(), "TestSample");
        self::assertEquals($obj->getProtectionEligibility(), "TestSample");
        self::assertEquals($obj->getProtectionEligibilityType(), "TestSample");
        self::assertEquals($obj->getClearingTime(), "TestSample");
        self::assertEquals($obj->getPaymentHoldStatus(), "TestSample");
        self::assertEquals($obj->getPaymentHoldReasons(), "TestSample");
        self::assertEquals($obj->getTransactionFee(), CurrencyTest::getObject());
        self::assertEquals($obj->getReceivableAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getExchangeRate(), "TestSample");
        self::assertEquals($obj->getFmfDetails(), FmfDetailsTest::getObject());
        self::assertEquals($obj->getReceiptId(), "TestSample");
        self::assertEquals($obj->getParentPayment(), "TestSample");
        self::assertEquals($obj->getProcessorResponse(), ProcessorResponseTest::getObject());
        self::assertEquals($obj->getBillingAgreementId(), "TestSample");
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Sale $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(SaleTest::getJson());

        $result = $obj->get("saleId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Sale $obj
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
