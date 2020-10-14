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
    public static function getJson()
    {
        return '{"return_url":"http://www.google.com","cancel_url":"http://www.google.com"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return RedirectUrls
     */
    public static function getObject()
    {
        return new RedirectUrls(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return RedirectUrls
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals("http://www.google.com", $obj->getReturnUrl());
        self::assertEquals("http://www.google.com", $obj->getCancelUrl());
    }

    public function testUrlValidationForReturnUrl()
    {
        $this->expectExceptionMessage("ReturnUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new RedirectUrls();
        $obj->setReturnUrl(null);
    }

    public function testUrlValidationForCancelUrl()
    {
        $this->expectExceptionMessage("CancelUrl is not a fully qualified URL");
        $this->expectException(\InvalidArgumentException::class);
        $obj = new RedirectUrls();
        $obj->setCancelUrl(null);
    }
}
