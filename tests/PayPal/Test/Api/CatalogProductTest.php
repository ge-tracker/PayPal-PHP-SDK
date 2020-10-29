<?php

namespace PayPal\Test\Api;

use PayPal\Api\CatalogProduct;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class CatalogProduct
 */
class CatalogProductTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","name":"TestSample","description":"TestSample","type":"TestSample","category":"TestSample","image_url":"TestSample","home_url":"TestSample","create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return CatalogProduct
     */
    public static function getObject()
    {
        return new CatalogProduct(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return CatalogProduct
     */
    public function testSerializationDeserialization()
    {
        $obj = new CatalogProduct(self::getJson());
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getDescription());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getCategory());
        self::assertNotNull($obj->getImageUrl());
        self::assertNotNull($obj->getHomeUrl());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param CatalogProduct $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getDescription());
        self::assertEquals('TestSample', $obj->getType());
        self::assertEquals('TestSample', $obj->getCategory());
        self::assertEquals('TestSample', $obj->getImageUrl());
        self::assertEquals('TestSample', $obj->getHomeUrl());
        self::assertEquals('TestSample', $obj->getCreateTime());
        self::assertEquals('TestSample', $obj->getUpdateTime());
    }

    /**
     * @dataProvider mockProvider
     *
     * @param CatalogProduct $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get('productId', $mockApiContext, $mockPayPalRestCall);
        self::assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     *
     * @param CatalogProduct $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
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
     *
     * @param CatalogProduct $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
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
     *
     * @param CatalogProduct $obj
     */
    public function testList($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(CatalogProductListTest::getJson());

        $result = $obj->all([], $mockApiContext, $mockPayPalRestCall);
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
