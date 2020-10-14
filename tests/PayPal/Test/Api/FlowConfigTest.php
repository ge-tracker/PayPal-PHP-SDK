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
    public static function getJson()
    {
        return '{"landing_page_type":"TestSample","bank_txn_pending_url":"http://www.google.com","user_action":"TestSample","return_uri_http_method":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FlowConfig
     */
    public static function getObject()
    {
        return new FlowConfig(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FlowConfig
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getLandingPageType());
        self::assertEquals("http://www.google.com", $obj->getBankTxnPendingUrl());
        self::assertEquals("TestSample", $obj->getUserAction());
        self::assertEquals("TestSample", $obj->getReturnUriHttpMethod());
    }

    public function testUrlValidationForBankTxnPendingUrl()
    {
        $this->expectExceptionMessage("BankTxnPendingUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new FlowConfig();
        $obj->setBankTxnPendingUrl(null);
    }

}
