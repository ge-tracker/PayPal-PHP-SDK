<?php

namespace PayPal\Test\Api;

use PayPal\Api\Plan;
use PHPUnit\Framework\TestCase;

/**
 * Class Plan
 *
 * @package PayPal\Test\Api
 */
class PlanTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","name":"TestSample","description":"TestSample","type":"TestSample","state":"TestSample","create_time":"TestSample","update_time":"TestSample","payment_definitions":' .PaymentDefinitionTest::getJson() . ',"terms":' .TermsTest::getJson() . ',"merchant_preferences":' .MerchantPreferencesTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Plan
     */
    public static function getObject(): Plan
    {
        return new Plan(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Plan
     */
    public function testSerializationDeserialization(): Plan
    {
        $obj = new Plan(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getPaymentDefinitions());
        self::assertNotNull($obj->getTerms());
        self::assertNotNull($obj->getMerchantPreferences());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Plan $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getDescription(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getPaymentDefinitions(), PaymentDefinitionTest::getObject());
        self::assertEquals($obj->getTerms(), TermsTest::getObject());
        self::assertEquals($obj->getMerchantPreferences(), MerchantPreferencesTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Plan $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PlanTest::getJson());

        $result = $obj->get("planId", $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Plan $obj
     */
    public function testCreate($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->create($mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Plan $obj
     */
    public function testUpdate($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Plan $obj
     */
    public function testList($obj, $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PlanListTest::getJson());
        $params = ParamsTest::getObject();

        $result = $obj->all($params, $mockApiContext, $mockPayPalRestCall);
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
