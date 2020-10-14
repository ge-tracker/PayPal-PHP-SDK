<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\CartBase;
use PHPUnit\Framework\TestCase;

/**
 * Class CartBase
 *
 * @package PayPal\Test\Api
 */
class CartBaseTest extends TestCase
{
    /**
     * Gets Json String of Object CartBase
     * @return string
     */
    public static function getJson()
    {
        return '{"reference_id":"TestSample","amount":' .AmountTest::getJson() . ',"payee":' .PayeeTest::getJson() . ',"description":"TestSample","note_to_payee":"TestSample","custom":"TestSample","invoice_number":"TestSample","purchase_order":"TestSample","soft_descriptor":"TestSample","soft_descriptor_city":"TestSample","payment_options":' .PaymentOptionsTest::getJson() . ',"item_list":' .ItemListTest::getJson() . ',"notify_url":"http://www.google.com","order_url":"http://www.google.com","external_funding":' .ExternalFundingTest::getJson() . ',"type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return CartBase
     */
    public static function getObject()
    {
        return new CartBase(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return CartBase
     */
    public function testSerializationDeserialization()
    {
        $obj = new CartBase(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getReferenceId());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getPayee());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getNoteToPayee());
        self::assertNotNull($obj->getCustom());
        self::assertNotNull($obj->getInvoiceNumber());
        self::assertNotNull($obj->getPurchaseOrder());
        self::assertNotNull($obj->getSoftDescriptor());
        self::assertNotNull($obj->getSoftDescriptorCity());
        self::assertNotNull($obj->getPaymentOptions());
        self::assertNotNull($obj->getItemList());
        self::assertNotNull($obj->getNotifyUrl());
        self::assertNotNull($obj->getOrderUrl());
        self::assertNotNull($obj->getExternalFunding());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CartBase $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getReferenceId());
        self::assertEquals($obj->getAmount(), AmountTest::getObject());
        self::assertEquals($obj->getPayee(), PayeeTest::getObject());
        self::assertEquals("TestSample", $obj->getDescription());
        self::assertEquals("TestSample", $obj->getNoteToPayee());
        self::assertEquals("TestSample", $obj->getCustom());
        self::assertEquals("TestSample", $obj->getInvoiceNumber());
        self::assertEquals("TestSample", $obj->getPurchaseOrder());
        self::assertEquals("TestSample", $obj->getSoftDescriptor());
        self::assertEquals("TestSample", $obj->getSoftDescriptorCity());
        self::assertEquals($obj->getPaymentOptions(), PaymentOptionsTest::getObject());
        self::assertEquals($obj->getItemList(), ItemListTest::getObject());
        self::assertEquals("http://www.google.com", $obj->getNotifyUrl());
        self::assertEquals("http://www.google.com", $obj->getOrderUrl());
        self::assertEquals($obj->getExternalFunding(), ExternalFundingTest::getObject());
    }

    public function testUrlValidationForNotifyUrl()
    {
        $this->expectExceptionMessage("NotifyUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new CartBase();
        $obj->setNotifyUrl(null);
    }

    public function testUrlValidationForOrderUrl()
    {
        $this->expectExceptionMessage("OrderUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new CartBase();
        $obj->setOrderUrl(null);
    }
}
