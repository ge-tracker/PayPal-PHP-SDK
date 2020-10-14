<?php

namespace PayPal\Test\Api;

use PayPal\Api\FileAttachment;
use PayPal\Common\PayPalModel;
use PHPUnit\Framework\TestCase;

/**
 * Class FileAttachment
 */
class FileAttachmentTest extends TestCase
{
    /**
     * Gets Json String of Object FileAttachment
     * @return string
     */
    public static function getJson()
    {
        return '{"name":"TestSample","url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FileAttachment
     */
    public static function getObject()
    {
        return new FileAttachment(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return FileAttachment
     */
    public function testSerializationDeserialization()
    {
        $obj = new FileAttachment(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getUrl());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FileAttachment $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('http://www.google.com', $obj->getUrl());
    }

    public function testUrlValidationForUrl()
    {
        $this->expectExceptionMessage('Url is not a fully qualified URL');
        $this->expectException(\InvalidArgumentException::class);
        $obj = new FileAttachment();
        $obj->setUrl(null);
    }
}
