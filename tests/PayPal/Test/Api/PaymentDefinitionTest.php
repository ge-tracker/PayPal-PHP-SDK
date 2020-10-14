<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentDefinition;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentDefinition
 */
class PaymentDefinitionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","name":"TestSample","type":"TestSample","frequency_interval":"TestSample","frequency":"TestSample","cycles":"TestSample","amount":' . CurrencyTest::getJson() . ',"charge_models":' . ChargeModelTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentDefinition
     */
    public static function getObject()
    {
        return new PaymentDefinition(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentDefinition
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentDefinition(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getName());
        self::assertNotNull($obj->getType());
        self::assertNotNull($obj->getFrequencyInterval());
        self::assertNotNull($obj->getFrequency());
        self::assertNotNull($obj->getCycles());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getChargeModels());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDefinition $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getId());
        self::assertEquals('TestSample', $obj->getName());
        self::assertEquals('TestSample', $obj->getType());
        self::assertEquals('TestSample', $obj->getFrequencyInterval());
        self::assertEquals('TestSample', $obj->getFrequency());
        self::assertEquals('TestSample', $obj->getCycles());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getChargeModels(), ChargeModelTest::getObject());
    }
}
