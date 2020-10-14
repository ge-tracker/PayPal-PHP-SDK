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
    public static function getJson()
    {
        return '{"merchant_info":' .MerchantInfoTest::getJson() . ',"billing_info":' .BillingInfoTest::getJson() . ',"shipping_info":' .ShippingInfoTest::getJson() . ',"items":' .InvoiceItemTest::getJson() . ',"payment_term":' .PaymentTermTest::getJson() . ',"reference":"TestSample","discount":' .CostTest::getJson() . ',"shipping_cost":' .ShippingCostTest::getJson() . ',"custom":' .CustomAmountTest::getJson() . ',"allow_partial_payment":true,"minimum_amount_due":' .CurrencyTest::getJson() . ',"tax_calculated_after_discount":true,"tax_inclusive":true,"terms":"TestSample","note":"TestSample","merchant_memo":"TestSample","logo_url":"http://www.google.com","total_amount":' .CurrencyTest::getJson() . ',"attachments":' .FileAttachmentTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return TemplateData
     */
    public static function getObject()
    {
        return new TemplateData(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return TemplateData
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals($obj->getMerchantInfo(), MerchantInfoTest::getObject());
        self::assertEquals($obj->getBillingInfo(), BillingInfoTest::getObject());
        self::assertEquals($obj->getShippingInfo(), ShippingInfoTest::getObject());
        self::assertEquals($obj->getItems(), InvoiceItemTest::getObject());
        self::assertEquals($obj->getPaymentTerm(), PaymentTermTest::getObject());
        self::assertEquals("TestSample", $obj->getReference());
        self::assertEquals($obj->getDiscount(), CostTest::getObject());
        self::assertEquals($obj->getShippingCost(), ShippingCostTest::getObject());
        self::assertEquals($obj->getCustom(), CustomAmountTest::getObject());
        self::assertEquals(true, $obj->getAllowPartialPayment());
        self::assertEquals($obj->getMinimumAmountDue(), CurrencyTest::getObject());
        self::assertEquals(true, $obj->getTaxCalculatedAfterDiscount());
        self::assertEquals(true, $obj->getTaxInclusive());
        self::assertEquals("TestSample", $obj->getTerms());
        self::assertEquals("TestSample", $obj->getNote());
        self::assertEquals("TestSample", $obj->getMerchantMemo());
        self::assertEquals("http://www.google.com", $obj->getLogoUrl());
        self::assertEquals($obj->getTotalAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getAttachments(), FileAttachmentTest::getObject());
    }

    public function testUrlValidationForLogoUrl()
    {
        $this->expectExceptionMessage("LogoUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new TemplateData();
        $obj->setLogoUrl(null);
    }
}
