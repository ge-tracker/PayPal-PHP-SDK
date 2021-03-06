<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentCard;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentCard
 */
class PaymentCardTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentCard
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","number":"TestSample","type":"TestSample","expire_month":"123","expire_year":"123","start_month":"TestSample","start_year":"TestSample","cvv2":"TestSample","first_name":"TestSample","last_name":"TestSample","billing_country":"TestSample","billing_address":' . AddressTest::getJson() . ',"external_customer_id":"TestSample","status":"TestSample","card_product_class":"TestSample","valid_until":"TestSample","issue_number":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentCard
     */
    public static function getObject()
    {
        return new PaymentCard(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentCard
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentCard(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getNumber());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getExpireMonth());
        self::assertNotNull($obj->getExpireYear());
        self::assertNotNull($obj->getStartMonth());
        self::assertNotNull($obj->getStartYear());
        self::assertNotNull($obj->getCvv2());
        self::assertNotNull($obj->getFirstName());
        self::assertNotNull($obj->getLastName());
        self::assertNotNull($obj->getBillingCountry());
        self::assertNotNull($obj->getBillingAddress());
        self::assertNotNull($obj->getExternalCustomerId());
        self::assertNotNull($obj->getStatus());
        self::assertNotNull($obj->getCardProductClass());
        self::assertNotNull($obj->getValidUntil());
        self::assertNotNull($obj->getIssueNumber());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentCard $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getNumber());
        self::assertEquals('TestSample', $obj->getType());
        self::assertEquals('123', $obj->getExpireMonth());
        self::assertEquals('123', $obj->getExpireYear());
        self::assertEquals('TestSample', $obj->getStartMonth());
        self::assertEquals('TestSample', $obj->getStartYear());
        self::assertEquals('TestSample', $obj->getCvv2());
        self::assertEquals('TestSample', $obj->getFirstName());
        self::assertEquals('TestSample', $obj->getLastName());
        self::assertEquals('TestSample', $obj->getBillingCountry());
        self::assertEquals($obj->getBillingAddress(), AddressTest::getObject());
        self::assertEquals('TestSample', $obj->getExternalCustomerId());
        self::assertEquals('TestSample', $obj->getStatus());
        self::assertEquals('TestSample', $obj->getCardProductClass());
        self::assertEquals('TestSample', $obj->getValidUntil());
        self::assertEquals('TestSample', $obj->getIssueNumber());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}
