<?php

namespace PayPal\Test\Api;

use PayPal\Api\RedirectUrls;
use PHPUnit\Framework\TestCase;

/**
 * Class RedirectUrls
 *
 * @package PayPal\Test\Api
 */
class RedirectUrlsTest extends TestCase
{
    /**
     * Gets Json String of Object RedirectUrls
     * @return string
     */
    public static function getJson(): string
    {
        return '{"return_url":"http://www.google.com","cancel_url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RedirectUrls
     */
    public static function getObject(): RedirectUrls
    {
        return new RedirectUrls(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return RedirectUrls
     */
    public function testSerializationDeserialization(): RedirectUrls
    {
        $obj = new RedirectUrls(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getReturnUrl());
        self::assertNotNull($obj->getCancelUrl());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param RedirectUrls $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getReturnUrl(), "http://www.google.com");
        self::assertEquals($obj->getCancelUrl(), "http://www.google.com");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ReturnUrl is not a fully qualified URL
     */
    public function testUrlValidationForReturnUrl(): void
    {
        $obj = new RedirectUrls();
        $obj->setReturnUrl(null);
    }
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CancelUrl is not a fully qualified URL
     */
    public function testUrlValidationForCancelUrl(): void
    {
        $obj = new RedirectUrls();
        $obj->setCancelUrl(null);
    }
}
