<?php

namespace PayPal\Test\Api;

use PayPal\Api\ItemsArray;
use PayPal\Api\PayoutItem;
use PayPal\Transport\PPRestCall;
use PHPUnit\Framework\TestCase;

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
    public static function getJson(): string
    {
        return '{"recipient_type":"TestSample","amount":' .CurrencyTest::getJson() . ',"note":"TestSample","receiver":"TestSample","sender_item_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PayoutItem
     */
    public static function getObject(): PayoutItem
    {
        return new PayoutItem(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PayoutItem
     */
    public function testSerializationDeserialization(): PayoutItem
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getRecipientType(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getNote(), "TestSample");
        self::assertEquals($obj->getReceiver(), "TestSample");
        self::assertEquals($obj->getSenderItemId(), "TestSample");
    }

    /**
     * @dataProvider mockProvider
     * @param PayoutItem $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
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
    public function testCancel($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PayoutItemDetailsTest::getJson());

        $result = $obj->cancel("payoutItemId", $mockApiContext, $mockPPRestCall);
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
