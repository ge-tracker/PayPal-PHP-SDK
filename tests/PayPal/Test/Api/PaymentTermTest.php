<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentTerm;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentTerm
 */
class PaymentTermTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentTerm
     * @return string
     */
    public static function getJson()
    {
        return '{"term_type":"TestSample","due_date":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentTerm
     */
    public static function getObject()
    {
        return new PaymentTerm(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentTerm
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentTerm(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getTermType());
        self::assertNotNull($obj->getDueDate());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentTerm $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getTermType());
        self::assertEquals('TestSample', $obj->getDueDate());
    }
}
