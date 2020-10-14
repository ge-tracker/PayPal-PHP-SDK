<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\Template;
use PayPal\Rest\ApiContext;
use PayPal\Api\Templates;
use PHPUnit\Framework\TestCase;
use PayPal\Transport\PayPalRestCall;

/**
 * Class Templates
 *
 * @package PayPal\Test\Api
 */
class TemplatesTest extends TestCase
{
    /**
     * Gets Json String of Object Templates
     * @return string
     */
    public static function getJson()
    {
        return '{"addresses":' .AddressTest::getJson() . ',"emails":"TestSample","phones":' .PhoneTest::getJson() . ',"templates":' .TemplateTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Templates
     */
    public static function getObject()
    {
        return new Templates(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Templates
     */
    public function testSerializationDeserialization()
    {
        $obj = new Templates(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getAddresses());
        self::assertNotNull($obj->getEmails());
        self::assertNotNull($obj->getPhones());
        self::assertNotNull($obj->getTemplates());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Templates $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getAddresses(), AddressTest::getObject());
        self::assertEquals("TestSample", $obj->getEmails());
        self::assertEquals($obj->getPhones(), PhoneTest::getObject());
        self::assertEquals($obj->getTemplates(), TemplateTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Templates $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(TemplateTest::getJson());

        $result = $obj->get("templateId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Templates $obj
     */
    public function testGetAll($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());
        $params = array();

        $result = $obj->getAll($params, $mockApiContext, $mockPPRestCall);
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
