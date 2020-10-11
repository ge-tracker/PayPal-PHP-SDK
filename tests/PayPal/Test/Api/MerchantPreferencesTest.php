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
    public static function getJson(): string
    {
        return '{"id":"TestSample","setup_fee":' .CurrencyTest::getJson() . ',"cancel_url":"http://www.google.com","return_url":"http://www.google.com","notify_url":"http://www.google.com","max_fail_attempts":"TestSample","auto_bill_amount":"TestSample","initial_fail_amount_action":"TestSample","accepted_payment_type":"TestSample","char_set":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return MerchantPreferences
     */
    public static function getObject(): MerchantPreferences
    {
        return new MerchantPreferences(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return MerchantPreferences
     */
    public function testSerializationDeserialization(): MerchantPreferences
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getSetupFee(), CurrencyTest::getObject());
        self::assertEquals($obj->getCancelUrl(), "http://www.google.com");
        self::assertEquals($obj->getReturnUrl(), "http://www.google.com");
        self::assertEquals($obj->getNotifyUrl(), "http://www.google.com");
        self::assertEquals($obj->getMaxFailAttempts(), "TestSample");
        self::assertEquals($obj->getAutoBillAmount(), "TestSample");
        self::assertEquals($obj->getInitialFailAmountAction(), "TestSample");
        self::assertEquals($obj->getAcceptedPaymentType(), "TestSample");
        self::assertEquals($obj->getCharSet(), "TestSample");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CancelUrl is not a fully qualified URL
     */
    public function testUrlValidationForCancelUrl(): void
    {
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ReturnUrl is not a fully qualified URL
     */
    public function testUrlValidationForReturnUrl(): void
    {
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage NotifyUrl is not a fully qualified URL
     */
    public function testUrlValidationForNotifyUrl(): void
    {
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
    }

    public function testUrlValidationForCancelUrlDeprecated(): void
    {
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
        self::assertNull($obj->getCancelUrl());
    }
    public function testUrlValidationForReturnUrlDeprecated(): void
    {
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
        self::assertNull($obj->getReturnUrl());
    }
    public function testUrlValidationForNotifyUrlDeprecated(): void
    {
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
        self::assertNull($obj->getNotifyUrl());
    }
}
