<?php

namespace PayPal\Test\Api;

use PayPal\Api\Metadata;
use PHPUnit\Framework\TestCase;

/**
 * Class Metadata
 *
 * @package PayPal\Test\Api
 */
class MetadataTest extends TestCase
{
    /**
     * Gets Json String of Object Metadata
     * @return string
     */
    public static function getJson(): string
    {
        return '{"created_date":"TestSample","created_by":"TestSample","cancelled_date":"TestSample","cancelled_by":"TestSample","last_updated_date":"TestSample","last_updated_by":"TestSample","first_sent_date":"TestSample","last_sent_date":"TestSample","last_sent_by":"TestSample","payer_view_url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Metadata
     */
    public static function getObject(): Metadata
    {
        return new Metadata(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Metadata
     */
    public function testSerializationDeserialization(): Metadata
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getCreatedDate(), "TestSample");
        self::assertEquals($obj->getCreatedBy(), "TestSample");
        self::assertEquals($obj->getCancelledDate(), "TestSample");
        self::assertEquals($obj->getCancelledBy(), "TestSample");
        self::assertEquals($obj->getLastUpdatedDate(), "TestSample");
        self::assertEquals($obj->getLastUpdatedBy(), "TestSample");
        self::assertEquals($obj->getFirstSentDate(), "TestSample");
        self::assertEquals($obj->getLastSentDate(), "TestSample");
        self::assertEquals($obj->getLastSentBy(), "TestSample");
        self::assertEquals($obj->getPayerViewUrl(), "http://www.google.com");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PayerViewUrl is not a fully qualified URL
     */
    public function testUrlValidationForPayerViewUrl(): void
    {
        $obj = new Metadata();
        $obj->setPayerViewUrl(null);
    }

    public function testUrlValidationForPayerViewUrlDeprecated(): void
    {
        $obj = new Metadata();
        $obj->setPayer_view_url(null);
        self::assertNull($obj->getPayer_view_url());
    }
}
