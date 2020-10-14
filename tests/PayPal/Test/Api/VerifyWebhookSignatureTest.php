<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\VerifyWebhookSignatureResponse;
use PayPal\Rest\ApiContext;
use PayPal\Api\VerifyWebhookSignature;
use PHPUnit\Framework\TestCase;
use PayPal\Transport\PayPalRestCall;

/**
 * Class VerifyWebhookSignature
 *
 * @package PayPal\Test\Api
 */
class VerifyWebhookSignatureTest extends TestCase
{
    /**
     * Gets Json String of Object VerifyWebhookSignature
     * @return string
     */
    public static function getJson()
    {
        return '{"auth_algo":"TestSample","cert_url":"http://www.google.com","transmission_id":"TestSample","transmission_sig":"TestSample","transmission_time":"TestSample","webhook_id":"TestSample","webhook_event":' .WebhookEventTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return VerifyWebhookSignature
     */
    public static function getObject()
    {
        return new VerifyWebhookSignature(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return VerifyWebhookSignature
     */
    public function testSerializationDeserialization()
    {
        $obj = new VerifyWebhookSignature(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAuthAlgo());
        self::assertNotNull($obj->getCertUrl());
        self::assertNotNull($obj->getTransmissionId());
        self::assertNotNull($obj->getTransmissionSig());
        self::assertNotNull($obj->getTransmissionTime());
        self::assertNotNull($obj->getWebhookId());
        self::assertNotNull($obj->getWebhookEvent());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param VerifyWebhookSignature $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getAuthAlgo());
        self::assertEquals("http://www.google.com", $obj->getCertUrl());
        self::assertEquals("TestSample", $obj->getTransmissionId());
        self::assertEquals("TestSample", $obj->getTransmissionSig());
        self::assertEquals("TestSample", $obj->getTransmissionTime());
        self::assertEquals("TestSample", $obj->getWebhookId());
        self::assertEquals($obj->getWebhookEvent(), WebhookEventTest::getObject());
    }

    public function testUrlValidationForCertUrl()
    {
        $this->expectExceptionMessage("CertUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new VerifyWebhookSignature();
        $obj->setCertUrl(null);
    }

    public function testToJsonToIncludeRequestBodyAsWebhookEvent() {
        $obj = new VerifyWebhookSignature();
        $requestBody = '{"id":"123", "links": [], "something": {}}';
        $obj->setRequestBody($requestBody);

        self::assertEquals($obj->toJSON(), '{"webhook_event": ' . $requestBody .'}');
    }

    /**
     * @dataProvider mockProvider
     * @param VerifyWebhookSignature $obj
     */
    public function testPost($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(VerifyWebhookSignatureResponseTest::getJson());

        $result = $obj->post($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider()
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
