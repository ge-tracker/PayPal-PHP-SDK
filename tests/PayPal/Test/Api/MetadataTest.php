<?php

namespace PayPal\Test\Api;

use PayPal\Api\Metadata;
use PHPUnit\Framework\TestCase;

/**
 * Class Metadata
 */
class MetadataTest extends TestCase
{
    /**
     * Gets Json String of Object Metadata
     * @return string
     */
    public static function getJson()
    {
        return '{"created_date":"TestSample","created_by":"TestSample","cancelled_date":"TestSample","cancelled_by":"TestSample","last_updated_date":"TestSample","last_updated_by":"TestSample","first_sent_date":"TestSample","last_sent_date":"TestSample","last_sent_by":"TestSample","payer_view_url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Metadata
     */
    public static function getObject()
    {
        return new Metadata(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Metadata
     */
    public function testSerializationDeserialization()
    {
        $obj = new Metadata(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCreatedDate());
        self::assertNotNull($obj->getCreatedBy());
        self::assertNotNull($obj->getCancelledDate());
        self::assertNotNull($obj->getCancelledBy());
        self::assertNotNull($obj->getLastUpdatedDate());
        self::assertNotNull($obj->getLastUpdatedBy());
        self::assertNotNull($obj->getFirstSentDate());
        self::assertNotNull($obj->getLastSentDate());
        self::assertNotNull($obj->getLastSentBy());
        self::assertNotNull($obj->getPayerViewUrl());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Metadata $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getCreatedDate());
        self::assertEquals('TestSample', $obj->getCreatedBy());
        self::assertEquals('TestSample', $obj->getCancelledDate());
        self::assertEquals('TestSample', $obj->getCancelledBy());
        self::assertEquals('TestSample', $obj->getLastUpdatedDate());
        self::assertEquals('TestSample', $obj->getLastUpdatedBy());
        self::assertEquals('TestSample', $obj->getFirstSentDate());
        self::assertEquals('TestSample', $obj->getLastSentDate());
        self::assertEquals('TestSample', $obj->getLastSentBy());
        self::assertEquals('http://www.google.com', $obj->getPayerViewUrl());
    }

    public function testUrlValidationForPayerViewUrl()
    {
        $this->expectExceptionMessage('PayerViewUrl is not a fully qualified URL');
        $this->expectException(\InvalidArgumentException::class);
        $obj = new Metadata();
        $obj->setPayerViewUrl(null);
    }

    public function testUrlValidationForPayerViewUrlDeprecated()
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new Metadata();
        $obj->setPayerViewUrl(null);
        self::assertNull($obj->getPayerViewUrl());
    }
}
