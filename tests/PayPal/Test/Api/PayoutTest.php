<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payout;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class Payout
 */
class PayoutTest extends TestCase
{
    /**
     * Gets Json String of Object Payout
     * @return string
     */
    public static function getJson()
    {
        return '{"sender_batch_header":' . PayoutSenderBatchHeaderTest::getJson() . ',"items":' . PayoutItemTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payout
     */
    public static function getObject()
    {
        return new Payout(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payout
     */
    public function testSerializationDeserialization()
    {
        $obj = new Payout(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getSenderBatchHeader());
        self::assertNotNull($obj->getItems());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payout $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getSenderBatchHeader(), PayoutSenderBatchHeaderTest::getObject());
        self::assertEquals($obj->getItems(), PayoutItemTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Payout $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PayoutBatchTest::getJson());
        $params = [];

        $result = $obj->create($params, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     * @param Payout $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PayoutBatchTest::getJson());

        $result = $obj->get('payoutBatchId', $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider()
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();

        return [
            [$obj, $mockApiContext],
            [$obj, null],
        ];
    }
}
