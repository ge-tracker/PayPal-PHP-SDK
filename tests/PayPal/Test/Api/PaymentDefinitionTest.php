<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentDefinition;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentDefinition
 *
 * @package PayPal\Test\Api
 */
class PaymentDefinitionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","name":"TestSample","type":"TestSample","frequency_interval":"TestSample","frequency":"TestSample","cycles":"TestSample","amount":' .CurrencyTest::getJson() . ',"charge_models":' .ChargeModelTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentDefinition
     */
    public static function getObject(): PaymentDefinition
    {
        return new PaymentDefinition(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentDefinition
     */
    public function testSerializationDeserialization(): PaymentDefinition
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
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getName(), "TestSample");
        self::assertEquals($obj->getType(), "TestSample");
        self::assertEquals($obj->getFrequencyInterval(), "TestSample");
        self::assertEquals($obj->getFrequency(), "TestSample");
        self::assertEquals($obj->getCycles(), "TestSample");
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals($obj->getChargeModels(), ChargeModelTest::getObject());
    }
}
