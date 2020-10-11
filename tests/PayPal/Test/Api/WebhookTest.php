<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookList;
use PayPal\Rest\ApiContext;
use PayPal\Api\Webhook;
use PHPUnit\Framework\TestCase;

/**
 * Class Webhook
 *
 * @package PayPal\Test\Api
 */
class WebhookTest extends TestCase
{
    /**
     * Gets Json String of Object Webhook
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","url":"http://www.google.com","event_types":' .WebhookEventTypeTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Webhook
     */
    public static function getObject(): Webhook
    {
        return new Webhook(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Webhook
     */
    public function testSerializationDeserialization(): Webhook
    {
        $obj = new Webhook(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getUrl());
        self::assertNotNull($obj->getEventTypes());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Webhook $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getUrl(), "http://www.google.com");
        self::assertEquals($obj->getEventTypes(), WebhookEventTypeTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Url is not a fully qualified URL
     */
    public function testUrlValidationForUrl(): void
    {
        $obj = new Webhook();
        $obj->setUrl(null);
    }
    /**
     * @dataProvider mockProvider
     * @param Webhook $obj
     */
    public function testCreate($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Webhook $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(WebhookTest::getJson());

        $result = $obj->get("webhookId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Webhook $obj
     */
    public function testGetAll($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(WebhookListTest::getJson());
        $params = array();

        $result = $obj->getAllWithParams($params, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Webhook $obj
     */
    public function testUpdate($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Webhook $obj
     */
    public function testDelete($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);

        $result = $obj->delete($mockApiContext, $mockPPRestCall);
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
