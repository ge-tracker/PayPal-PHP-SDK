<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\FileAttachment;
use PHPUnit\Framework\TestCase;

/**
 * Class FileAttachment
 *
 * @package PayPal\Test\Api
 */
class FileAttachmentTest extends TestCase
{
    /**
     * Gets Json String of Object FileAttachment
     * @return string
     */
    public static function getJson(): string
    {
        return '{"name":"TestSample","url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FileAttachment
     */
    public static function getObject(): FileAttachment
    {
        return new FileAttachment(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FileAttachment
     */
    public function testSerializationDeserialization(): FileAttachment
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getUrl(), "http://www.google.com");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Url is not a fully qualified URL
     */
    public function testUrlValidationForUrl(): void
    {
        $obj = new FileAttachment();
        $obj->setUrl(null);
    }
}
