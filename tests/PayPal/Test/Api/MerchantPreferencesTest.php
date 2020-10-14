<?php

namespace PayPal\Test\Api;

use PayPal\Api\MerchantPreferences;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantPreferences
 *
 * @package PayPal\Test\Api
 */
class MerchantPreferencesTest extends TestCase
{
    /**
     * Gets Json String of Object MerchantPreferences
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","setup_fee":' .CurrencyTest::getJson() . ',"cancel_url":"http://www.google.com","return_url":"http://www.google.com","notify_url":"http://www.google.com","max_fail_attempts":"TestSample","auto_bill_amount":"TestSample","initial_fail_amount_action":"TestSample","accepted_payment_type":"TestSample","char_set":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantPreferences
     */
    public static function getObject()
    {
        return new MerchantPreferences(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantPreferences
     */
    public function testSerializationDeserialization()
    {
        $obj = new MerchantPreferences(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getSetupFee());
        self::assertNotNull($obj->getCancelUrl());
        self::assertNotNull($obj->getReturnUrl());
        self::assertNotNull($obj->getNotifyUrl());
        self::assertNotNull($obj->getMaxFailAttempts());
        self::assertNotNull($obj->getAutoBillAmount());
        self::assertNotNull($obj->getInitialFailAmountAction());
        self::assertNotNull($obj->getAcceptedPaymentType());
        self::assertNotNull($obj->getCharSet());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantPreferences $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals($obj->getSetupFee(), CurrencyTest::getObject());
        self::assertEquals("http://www.google.com", $obj->getCancelUrl());
        self::assertEquals("http://www.google.com", $obj->getReturnUrl());
        self::assertEquals("http://www.google.com", $obj->getNotifyUrl());
        self::assertEquals("TestSample", $obj->getMaxFailAttempts());
        self::assertEquals("TestSample", $obj->getAutoBillAmount());
        self::assertEquals("TestSample", $obj->getInitialFailAmountAction());
        self::assertEquals("TestSample", $obj->getAcceptedPaymentType());
        self::assertEquals("TestSample", $obj->getCharSet());
    }

    public function testUrlValidationForCancelUrl()
    {
        $this->expectExceptionMessage("CancelUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
    }

    public function testUrlValidationForReturnUrl()
    {
        $this->expectExceptionMessage("ReturnUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
    }

    public function testUrlValidationForNotifyUrl()
    {
        $this->expectExceptionMessage("NotifyUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
    }

    public function testUrlValidationForCancelUrlDeprecated()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
        self::assertNull($obj->getCancelUrl());
    }

    public function testUrlValidationForReturnUrlDeprecated()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
        self::assertNull($obj->getReturnUrl());
    }

    public function testUrlValidationForNotifyUrlDeprecated()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
        self::assertNull($obj->getNotifyUrl());
    }
}
