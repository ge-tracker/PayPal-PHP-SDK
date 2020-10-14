<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentInstruction;
use PayPal\Transport\PayPalRestCall;
use PayPal\Transport\PPRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentInstruction
 */
class PaymentInstructionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentInstruction
     * @return string
     */
    public static function getJson()
    {
        return '{"reference_number":"TestSample","instruction_type":"TestSample","recipient_banking_instruction":' . RecipientBankingInstructionTest::getJson() . ',"amount":' . CurrencyTest::getJson() . ',"payment_due_date":"TestSample","note":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentInstruction
     */
    public static function getObject()
    {
        return new PaymentInstruction(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentInstruction
     */
    public function testSerializationDeserialization()
    {
        $obj = new PaymentInstruction(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getReferenceNumber());
        self::assertNotNull($obj->getInstructionType());
        self::assertNotNull($obj->getRecipientBankingInstruction());
        self::assertNotNull($obj->getAmount());
        self::assertNotNull($obj->getPaymentDueDate());
        self::assertNotNull($obj->getNote());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentInstruction $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals('TestSample', $obj->getReferenceNumber());
        self::assertEquals('TestSample', $obj->getInstructionType());
        self::assertEquals($obj->getRecipientBankingInstruction(), RecipientBankingInstructionTest::getObject());
        self::assertEquals($obj->getAmount(), CurrencyTest::getObject());
        self::assertEquals('TestSample', $obj->getPaymentDueDate());
        self::assertEquals('TestSample', $obj->getNote());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param PaymentInstruction $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder(PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->get('paymentId', $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider()
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();

        return [
            [$obj, $mockApiContext],
            [$obj, null],
        ];
    }
}
