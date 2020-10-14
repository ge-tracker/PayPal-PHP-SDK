<?php

namespace PayPal\Test\Api;

use PayPal\Api\BillingCycles;
use PHPUnit\Framework\TestCase;

/**
 * Class BillingCycles
 */
class BillingCyclesTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     *
     * @return string
     */
    public static function getJson()
    {
        return '{"pricing_scheme":' . PricingSchemeTest::getJson() . ',"frequency":' . FrequencyTest::getJson() . ',"tenure_type":"TestSample","sequence":1,"total_cycles":0}';
    }

    /**
     * Gets Object Instance with Json data filled in
     *
     * @return BillingCycles
     */
    public static function getObject()
    {
        return new BillingCycles(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     *
     * @return BillingCycles
     */
    public function testSerializationDeserialization()
    {
        $obj = new BillingCycles(self::getJson());

        self::assertNotNull($obj);
        self::assertNotNull($obj->getPricingScheme());
        self::assertNotNull($obj->getFrequency());
        self::assertNotNull($obj->getTenureType());
        self::assertNotNull($obj->getSequence());
        self::assertNotNull($obj->getTotalCycles());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     *
     * @param BillingCycles $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getTenureType());
        self::assertEquals(1, $obj->getSequence());
        self::assertEquals(0, $obj->getTotalCycles());
        self::assertEquals($obj->getPricingScheme(), PricingSchemeTest::getObject());
        self::assertEquals($obj->getFrequency(), FrequencyTest::getObject());
    }
}
