<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookEventTypeList;
use PayPal\Rest\ApiContext;
use PayPal\Api\WebhookEventType;
use PHPUnit\Framework\TestCase;
use PayPal\Transport\PayPalRestCall;

/**
 * Class WebhookEventType
 *
 * @package PayPal\Test\Api
 */
class WebhookEventTypeTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookEventType
     * @return string
     */
    public static function getJson()
    {
        return '{"name":"TestSample","description":"TestSample","status":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookEventType
     */
    public static function getObject()
    {
        return new WebhookEventType(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookEventType
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebhookEventType(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getStatus());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventType $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getName());
        self::assertEquals("TestSample", $obj->getDescription());
        self::assertEquals("TestSample", $obj->getStatus());
    }

    /**
     * @dataProvider mockProvider
     * @param WebhookEventType $obj
     */
    public function testSubscribedEventTypes($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(WebhookEventTypeListTest::getJson());

        $result = $obj->subscribedEventTypes("webhookId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebhookEventType $obj
     */
    public function testAvailableEventTypes($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(WebhookEventTypeListTest::getJson());

        $result = $obj->availableEventTypes($mockApiContext, $mockPPRestCall);
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
