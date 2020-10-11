<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\FlowConfig;
use PHPUnit\Framework\TestCase;

/**
 * Class FlowConfig
 *
 * @package PayPal\Test\Api
 */
class FlowConfigTest extends TestCase
{
    /**
     * Gets Json String of Object FlowConfig
     * @return string
     */
    public static function getJson(): string
    {
        return '{"landing_page_type":"TestSample","bank_txn_pending_url":"http://www.google.com","user_action":"TestSample","return_uri_http_method":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FlowConfig
     */
    public static function getObject(): FlowConfig
    {
        return new FlowConfig(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FlowConfig
     */
    public function testSerializationDeserialization(): FlowConfig
    {
        $obj = new FlowConfig(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getLandingPageType());
        self::assertNotNull($obj->getBankTxnPendingUrl());
        self::assertNotNull($obj->getUserAction());
        self::assertNotNull($obj->getReturnUriHttpMethod());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FlowConfig $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getLandingPageType(), "TestSample");
        self::assertEquals($obj->getBankTxnPendingUrl(), "http://www.google.com");
        self::assertEquals($obj->getUserAction(), "TestSample");
        self::assertEquals($obj->getReturnUriHttpMethod(), "TestSample");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage BankTxnPendingUrl is not a fully qualified URL
     */
    public function testUrlValidationForBankTxnPendingUrl(): void
    {
        $obj = new FlowConfig();
        $obj->setBankTxnPendingUrl(null);
    }

}
