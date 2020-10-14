<?php

namespace PayPal\Test\Api;

use PayPal\Api\Agreement;
use PHPUnit\Framework\TestCase;

/**
 * Class Agreement
 *
 * @package PayPal\Test\Api
 */
class AgreementTest extends TestCase
{
    /**
     * Gets Json String of Object Agreement
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","state":"TestSample","name":"TestSample","description":"TestSample","start_date":"TestSample","payer":' .PayerTest::getJson() . ',"shipping_address":' .AddressTest::getJson() . ',"override_merchant_preferences":' .MerchantPreferencesTest::getJson() . ',"override_charge_models":' .OverrideChargeModelTest::getJson() . ',"plan":' .PlanTest::getJson() . ',"create_time":"TestSample","agreement_details":{"outstanding_balance":{"currency":"USD","value":"0.00"},"cycles_remaining":"12","cycles_completed":"0","next_billing_date":"2015-06-17T10:00:00Z","last_payment_date":"2015-03-18T20:20:17Z","last_payment_amount":{"currency":"USD","value":"1.00"},"final_payment_date":"2017-04-17T10:00:00Z","failed_payment_count":"0"},"update_time":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Agreement
     */
    public static function getObject()
    {
        return new Agreement(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Agreement
     */
    public function testSerializationDeserialization()
    {
        $obj = new Agreement(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getStartDate());
        self::assertNotNull($obj->getPayer());
        self::assertNotNull($obj->getShippingAddress());
        self::assertNotNull($obj->getOverrideMerchantPreferences());
        self::assertNotNull($obj->getOverrideChargeModels());
        self::assertNotNull($obj->getPlan());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Agreement $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals("TestSample", $obj->getState());
        self::assertEquals("TestSample", $obj->getName());
        self::assertEquals("TestSample", $obj->getDescription());
        self::assertEquals("TestSample", $obj->getStartDate());
        self::assertEquals($obj->getPayer(), PayerTest::getObject());
        self::assertEquals($obj->getShippingAddress(), AddressTest::getObject());
        self::assertEquals($obj->getOverrideMerchantPreferences(), MerchantPreferencesTest::getObject());
        self::assertEquals($obj->getOverrideChargeModels(), OverrideChargeModelTest::getObject());
        self::assertEquals($obj->getPlan(), PlanTest::getObject());
        self::assertEquals("TestSample", $obj->getCreateTime());
        self::assertEquals("TestSample", $obj->getUpdateTime());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testExecute($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->execute("123123", $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->get("agreementId", $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testSuspend($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->suspend($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testReActivate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->reActivate($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testCancel($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->cancel($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testBillBalance($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->billBalance($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testSetBalance($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $currency = CurrencyTest::getObject();

        $result = $obj->setBalance($currency, $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testTransactions($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    AgreementTransactionsTest::getJson()
            ));

        $result = $obj->searchTransactions("agreementId", array(), $mockApiContext, $mockPayPalRestCall);
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
