<?php

namespace PayPal\Test\Api;

use PayPal\Api\TemplateData;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateData
 *
 * @package PayPal\Test\Api
 */
class TemplateDataTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateData
     * @return string
     */
    public static function getJson(): string
    {
        return '{"merchant_info":' .MerchantInfoTest::getJson() . ',"billing_info":' .BillingInfoTest::getJson() . ',"shipping_info":' .ShippingInfoTest::getJson() . ',"items":' .InvoiceItemTest::getJson() . ',"payment_term":' .PaymentTermTest::getJson() . ',"reference":"TestSample","discount":' .CostTest::getJson() . ',"shipping_cost":' .ShippingCostTest::getJson() . ',"custom":' .CustomAmountTest::getJson() . ',"allow_partial_payment":true,"minimum_amount_due":' .CurrencyTest::getJson() . ',"tax_calculated_after_discount":true,"tax_inclusive":true,"terms":"TestSample","note":"TestSample","merchant_memo":"TestSample","logo_url":"http://www.google.com","total_amount":' .CurrencyTest::getJson() . ',"attachments":' .FileAttachmentTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return TemplateData
     */
    public static function getObject(): TemplateData
    {
        return new TemplateData(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return TemplateData
     */
    public function testSerializationDeserialization(): TemplateData
    {
        $obj = new TemplateData(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getMerchantInfo());
        self::assertNotNull($obj->getBillingInfo());
        self::assertNotNull($obj->getShippingInfo());
        self::assertNotNull($obj->getItems());
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
        self::assertNotNull($obj->getAttachments());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param TemplateData $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getMerchantInfo(), MerchantInfoTest::getObject());
        self::assertEquals($obj->getBillingInfo(), BillingInfoTest::getObject());
        self::assertEquals($obj->getShippingInfo(), ShippingInfoTest::getObject());
        self::assertEquals($obj->getItems(), InvoiceItemTest::getObject());
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
        self::assertEquals($obj->getAttachments(), FileAttachmentTest::getObject());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage LogoUrl is not a fully qualified URL
     */
    public function testUrlValidationForLogoUrl(): void
    {
        $obj = new TemplateData();
        $obj->setLogoUrl(null);
    }
}
