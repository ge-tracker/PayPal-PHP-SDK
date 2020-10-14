<?php

namespace PayPal\Test\Api;

use PayPal\Api\WebProfile;
use PHPUnit\Framework\TestCase;

/**
 * Class WebProfile
 *
 * @package PayPal\Test\Api
 */
class WebProfileTest extends TestCase
{
    /**
     * Gets Json String of Object WebProfile
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","name":"TestSample","temporary":true,"flow_config":' .FlowConfigTest::getJson() . ',"input_fields":' .InputFieldsTest::getJson() . ',"presentation":' .PresentationTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return WebProfile
     */
    public static function getObject()
    {
        return new WebProfile(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return WebProfile
     */
    public function testSerializationDeserialization()
    {
        $obj = new WebProfile(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getTemporary());
        self::assertNotNull($obj->getFlowConfig());
        self::assertNotNull($obj->getInputFields());
        self::assertNotNull($obj->getPresentation());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebProfile $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals("TestSample", $obj->getName());
        self::assertEquals(true, $obj->getTemporary());
        self::assertEquals($obj->getFlowConfig(), FlowConfigTest::getObject());
        self::assertEquals($obj->getInputFields(), InputFieldsTest::getObject());
        self::assertEquals($obj->getPresentation(), PresentationTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));

        $result = $obj->update($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testPartialUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $patch = array(PatchTest::getObject());

        $result = $obj->partial_update($patch, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
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

        $result = $obj->get("profileId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testGetList($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    json_encode(array(json_decode(self::getJson())))
            ));

        $result = $obj->get_list($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param WebProfile $obj
     */
    public function testDelete($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));

        $result = $obj->delete($mockApiContext, $mockPPRestCall);
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
