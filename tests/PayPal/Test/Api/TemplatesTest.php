<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\Template;
use PayPal\Rest\ApiContext;
use PayPal\Api\Templates;
use PHPUnit\Framework\TestCase;

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
    public static function getJson(): string
    {
        return '{"addresses":' .AddressTest::getJson() . ',"emails":"TestSample","phones":' .PhoneTest::getJson() . ',"templates":' .TemplateTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Templates
     */
    public static function getObject(): Templates
    {
        return new Templates(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Templates
     */
    public function testSerializationDeserialization(): Templates
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getAddresses(), AddressTest::getObject());
        self::assertEquals($obj->getEmails(), "TestSample");
        self::assertEquals($obj->getPhones(), PhoneTest::getObject());
        self::assertEquals($obj->getTemplates(), TemplateTest::getObject());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Templates $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
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
    public function testGetAll($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(TemplatesTest::getJson());
        $params = array();

        $result = $obj->getAll($params, $mockApiContext, $mockPPRestCall);
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
