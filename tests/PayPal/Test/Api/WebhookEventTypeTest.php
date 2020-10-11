<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookEventTypeList;
use PayPal\Rest\ApiContext;
use PayPal\Api\WebhookEventType;
use PHPUnit\Framework\TestCase;

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
    public static function getJson(): string
    {
        return '{"name":"TestSample","description":"TestSample","status":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookEventType
     */
    public static function getObject(): WebhookEventType
    {
        return new WebhookEventType(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookEventType
     */
    public function testSerializationDeserialization(): WebhookEventType
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getDescription(), "TestSample");
        self::assertEquals($obj->getStatus(), "TestSample");
    }

    /**
     * @dataProvider mockProvider
     * @param WebhookEventType $obj
     */
    public function testSubscribedEventTypes($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
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
    public function testAvailableEventTypes($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(WebhookEventTypeListTest::getJson());

        $result = $obj->availableEventTypes($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider(): array
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
