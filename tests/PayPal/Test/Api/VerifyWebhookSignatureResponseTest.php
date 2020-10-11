<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\VerifyWebhookSignatureResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class VerifyWebhookSignatureResponse
 *
 * @package PayPal\Test\Api
 */
class VerifyWebhookSignatureResponseTest extends TestCase
{
    /**
     * Gets Json String of Object VerifyWebhookSignatureResponse
     * @return string
     */
    public static function getJson(): string
    {
        return '{"verification_status":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return VerifyWebhookSignatureResponse
     */
    public static function getObject(): VerifyWebhookSignatureResponse
    {
        return new VerifyWebhookSignatureResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return VerifyWebhookSignatureResponse
     */
    public function testSerializationDeserialization(): VerifyWebhookSignatureResponse
    {
        $obj = new VerifyWebhookSignatureResponse(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getVerificationStatus());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param VerifyWebhookSignatureResponse $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getVerificationStatus(), "TestSample");
    }

}
