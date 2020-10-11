<?php

namespace PayPal\Test\Api;

use PayPal\Api\Invoice;
use PayPal\Api\InvoiceNumber;
use PHPUnit\Framework\TestCase;

/**
 * Class Invoice
 *
 * @package PayPal\Test\Api
 */
class InvoiceTest extends TestCase
{
    /**
     * Gets Json String of Object Invoice
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","number":"TestSample","template_id":"TestSample","uri":"TestSample","status":"TestSample","merchant_info":' .MerchantInfoTest::getJson() . ',"billing_info":' .BillingInfoTest::getJson() . ',"cc_info":' .ParticipantTest::getJson() . ',"shipping_info":' .ShippingInfoTest::getJson() . ',"items":' .InvoiceItemTest::getJson() . ',"invoice_date":"TestSample","payment_term":' .PaymentTermTest::getJson() . ',"reference":"TestSample","discount":' .CostTest::getJson() . ',"shipping_cost":' .ShippingCostTest::getJson() . ',"custom":' .CustomAmountTest::getJson() . ',"allow_partial_payment":true,"minimum_amount_due":' .CurrencyTest::getJson() . ',"tax_calculated_after_discount":true,"tax_inclusive":true,"terms":"TestSample","note":"TestSample","merchant_memo":"TestSample","logo_url":"http://www.google.com","total_amount":' .CurrencyTest::getJson() . ',"payments":' .PaymentDetailTest::getJson() . ',"refunds":' .RefundDetailTest::getJson() . ',"metadata":' .MetadataTest::getJson() . ',"additional_data":"TestSample","gratuity":' .CurrencyTest::getJson() . ',"paid_amount":' .PaymentSummaryTest::getJson() . ',"refunded_amount":' .PaymentSummaryTest::getJson() . ',"attachments":' .FileAttachmentTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Invoice
     */
    public static function getObject(): Invoice
    {
        return new Invoice(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Invoice
     */
    public function testSerializationDeserialization(): Invoice
    {
        $obj = new Invoice(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getNumber());
        self::assertNotNull($obj->getTemplateId());
        self::assertNotNull($obj->getUri());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getMerchantInfo());
        self::assertNotNull($obj->getBillingInfo());
        self::assertNotNull($obj->getCcInfo());
        self::assertNotNull($obj->getShippingInfo());
        self::assertNotNull($obj->getItems());
        self::assertNotNull($obj->getInvoiceDate());
        self::assertNotNull($obj->getPaymentTerm());
        self::assertNotNull($obj->getReference());
        self::assertNotNull($obj->getDiscount());
        self::assertNotNull($obj->getShippingCost());
        self::assertNotNull($obj->getCustom());
        self::assertNotNull($obj->getAllowPartialPayment());
        self::assertNotNull($obj->getMinimumAmountDue());
        self::assertNotNull($obj->getTaxCalculatedAfterDiscount());
        self::assertNotNull($obj->getTaxInclusive());
        self::assertNotNull($obj->getTerms());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getMerchantMemo());
        self::assertNotNull($obj->getLogoUrl());
        self::assertNotNull($obj->getTotalAmount());
        self::assertNotNull($obj->getPayments());
        self::assertNotNull($obj->getRefunds());
        self::assertNotNull($obj->getMetadata());
        self::assertNotNull($obj->getAdditionalData());
        self::assertNotNull($obj->getPaidAmount());
        self::assertNotNull($obj->getRefundedAmount());
        self::assertNotNull($obj->getAttachments());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Invoice $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getNumber(), "TestSample");
        self::assertEquals($obj->getTemplateId(), "TestSample");
        self::assertEquals($obj->getUri(), "TestSample");
        self::assertEquals($obj->getStatus(), "TestSample");
        self::assertEquals($obj->getMerchantInfo(), MerchantInfoTest::getObject());
        self::assertEquals($obj->getBillingInfo(), BillingInfoTest::getObject());
        self::assertEquals($obj->getCcInfo(), ParticipantTest::getObject());
        self::assertEquals($obj->getShippingInfo(), ShippingInfoTest::getObject());
        self::assertEquals($obj->getItems(), InvoiceItemTest::getObject());
        self::assertEquals($obj->getInvoiceDate(), "TestSample");
        self::assertEquals($obj->getPaymentTerm(), PaymentTermTest::getObject());
        self::assertEquals($obj->getReference(), "TestSample");
        self::assertEquals($obj->getDiscount(), CostTest::getObject());
        self::assertEquals($obj->getShippingCost(), ShippingCostTest::getObject());
        self::assertEquals($obj->getCustom(), CustomAmountTest::getObject());
        self::assertEquals($obj->getAllowPartialPayment(), true);
        self::assertEquals($obj->getMinimumAmountDue(), CurrencyTest::getObject());
        self::assertEquals($obj->getTaxCalculatedAfterDiscount(), true);
        self::assertEquals($obj->getTaxInclusive(), true);
        self::assertEquals($obj->getTerms(), "TestSample");
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getMerchantMemo(), "TestSample");
        self::assertEquals($obj->getLogoUrl(), "http://www.google.com");
        self::assertEquals($obj->getTotalAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getPayments(), PaymentDetailTest::getObject());
        self::assertEquals($obj->getRefunds(), RefundDetailTest::getObject());
        self::assertEquals($obj->getMetadata(), MetadataTest::getObject());
        self::assertEquals($obj->getAdditionalData(), "TestSample");
        self::assertEquals($obj->getPaidAmount(), PaymentSummaryTest::getObject());
        self::assertEquals($obj->getRefundedAmount(), PaymentSummaryTest::getObject());
        self::assertEquals($obj->getAttachments(), FileAttachmentTest::getObject());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage LogoUrl is not a fully qualified URL
     */
    public function testUrlValidationForLogoUrl(): void
    {
        $obj = new Invoice();
        $obj->setLogoUrl(null);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testCreate($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
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
     * @param Invoice $obj
     */
    public function testSearch($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(InvoiceSearchResponseTest::getJson());
        $search = SearchTest::getObject();

        $result = $obj->search($search, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testSend($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);

        $result = $obj->send($mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testRemind($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $notification = NotificationTest::getObject();

        $result = $obj->remind($notification, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testCancel($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $cancelNotification = CancelNotificationTest::getObject();

        $result = $obj->cancel($cancelNotification, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testRecordPayment($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $paymentDetail = PaymentDetailTest::getObject();

        $result = $obj->recordPayment($paymentDetail, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testRecordRefund($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $refundDetail = RefundDetailTest::getObject();

        $result = $obj->recordRefund($refundDetail, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(InvoiceTest::getJson());

        $result = $obj->get("invoiceId", $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testGetAll($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(InvoiceSearchResponseTest::getJson());

        $result = $obj->getAll(array(), $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testUpdate($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->update($mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testDelete($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);

        $result = $obj->delete($mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testQrCode($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(ImageTest::getJson());

        $result = $obj->qrCode("invoiceId", array(), $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Invoice $obj
     */
    public function testGenerateNumber($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(InvoiceNumberTest::getJson());

        $result = $obj->generateNumber($mockApiContext, $mockPPRestCall);
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
