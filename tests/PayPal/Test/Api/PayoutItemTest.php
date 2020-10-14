<?php

namespace PayPal\Test\Api;

use PayPal\Api\ItemsArray;
use PayPal\Api\PayoutItem;
use PayPal\Transport\PPRestCall;
use PHPUnit\Framework\TestCase;
use PayPal\Transport\PayPalRestCall;

/**
 * Class PayoutItem
 *
 * @package PayPal\Test\Api
 */
class PayoutItemTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutItem
     * @return string
     */
    public static function getJson()
    {
        return '{"recipient_type":"TestSample","amount":' .CurrencyTest::getJson() . ',"note":"TestSample","receiver":"TestSample","sender_item_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutItem
     */
    public static function getObject()
    {
        return new PayoutItem(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutItem
     */
    public function testSerializationDeserialization()
    {
        $obj = new PayoutItem(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getRecipientType());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getReceiver());
        self::assertNotNull($obj->getSenderItemId());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutItem $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getRecipientType());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals("TestSample", $obj->getNote());
        self::assertEquals("TestSample", $obj->getReceiver());
        self::assertEquals("TestSample", $obj->getSenderItemId());
    }

    /**
     * @dataProvider mockProvider
     * @param PayoutItem $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PayoutItemDetailsTest::getJson());

        $result = $obj->get("payoutItemId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     * @param PayoutItem $obj
     */
    public function testCancel($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PayoutItemDetailsTest::getJson());

        $result = $obj->cancel("payoutItemId", $mockApiContext, $mockPPRestCall);
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
