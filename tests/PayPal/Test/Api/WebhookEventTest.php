<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookEventList;
use PayPal\Rest\ApiContext;
use PayPal\Api\WebhookEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookEvent
 *
 * @package PayPal\Test\Api
 */
class WebhookEventTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookEvent
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","create_time":"TestSample","resource_type":"TestSample","event_version":"TestSample","event_type":"TestSample","summary":"TestSample","resource":"TestSampleObject","status":"TestSample","transmissions":"TestSampleObject","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebhookEvent
     */
    public static function getObject()
    {
        return new WebhookEvent(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebhookEvent
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebhookEvent(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getResourceType());
        self::assertNotNull($obj->getEventVersion());
        self::assertNotNull($obj->getEventType());
        self::assertNotNull($obj->getSummary());
        self::assertNotNull($obj->getResource());
//        self::assertNotNull($obj->getStatus());
//        self::assertNotNull($obj->getTransmissions());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEvent $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals("TestSample", $obj->getCreateTime());
        self::assertEquals("TestSample", $obj->getResourceType());
        self::assertEquals("TestSample", $obj->getEventVersion());
        self::assertEquals("TestSample", $obj->getEventType());
        self::assertEquals("TestSample", $obj->getSummary());
        self::assertEquals("TestSampleObject", $obj->getResource());
//        self::assertEquals("TestSample", $obj->getStatus());
//        self::assertEquals("TestSampleObject", $obj->getTransmissions());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param WebhookEvent $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->get("eventId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebhookEvent $obj
     */
    public function testResend($obj, $mockApiContext)
    {
        self::markTestSkipped();
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));
        $eventResend = EventResendTest::getObject();

        $result = $obj->resend($eventResend, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebhookEvent $obj
     */
    public function testList($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    WebhookEventListTest::getJson()
            ));
        $params = array();

        $result = $obj->all($params, $mockApiContext, $mockPPRestCall);
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
