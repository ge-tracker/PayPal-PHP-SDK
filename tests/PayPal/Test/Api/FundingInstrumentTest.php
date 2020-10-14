<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingInstrument;
use PHPUnit\Framework\TestCase;

/**
 * Class FundingInstrument
 */
class FundingInstrumentTest extends TestCase
{
    /**
     * Gets Json String of Object FundingInstrument
     * @return string
     */
    public static function getJson()
    {
        return '{"credit_card":' . CreditCardTest::getJson() . ',"credit_card_token":' . CreditCardTokenTest::getJson() . ',"payment_card":' . PaymentCardTest::getJson() . ',"bank_account":' . ExtendedBankAccountTest::getJson() . ',"bank_account_token":' . BankTokenTest::getJson() . ',"credit":' . CreditTest::getJson() . ',"incentive":' . IncentiveTest::getJson() . ',"external_funding":' . ExternalFundingTest::getJson() . ',"carrier_account_token":' . CarrierAccountTokenTest::getJson() . ',"carrier_account":' . CarrierAccountTest::getJson() . ',"private_label_card":' . PrivateLabelCardTest::getJson() . ',"billing":' . BillingTest::getJson() . ',"alternate_payment":' . AlternatePaymentTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingInstrument
     */
    public static function getObject()
    {
        return new FundingInstrument(self::getJson());
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingInstrument
     */
    public function testSerializationDeserialization()
    {
        $obj = new FundingInstrument(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getCreditCard());
        self::assertNotNull($obj->getCreditCardToken());
        self::assertNotNull($obj->getPaymentCard());
        self::assertNotNull($obj->getBankAccount());
        self::assertNotNull($obj->getBankAccountToken());
        self::assertNotNull($obj->getCredit());
        self::assertNotNull($obj->getIncentive());
        self::assertNotNull($obj->getExternalFunding());
        self::assertNotNull($obj->getCarrierAccountToken());
        self::assertNotNull($obj->getCarrierAccount());
        self::assertNotNull($obj->getPrivateLabelCard());
        self::assertNotNull($obj->getBilling());
        self::assertEquals(self::getJson(), $obj->toJson());

        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingInstrument $obj
     */
    public function testGetters($obj)
    {
        self::assertEquals($obj->getCreditCard(), CreditCardTest::getObject());
        self::assertEquals($obj->getCreditCardToken(), CreditCardTokenTest::getObject());
        self::assertEquals($obj->getPaymentCard(), PaymentCardTest::getObject());
        self::assertEquals($obj->getBankAccount(), ExtendedBankAccountTest::getObject());
        self::assertEquals($obj->getBankAccountToken(), BankTokenTest::getObject());
        self::assertEquals($obj->getCredit(), CreditTest::getObject());
        self::assertEquals($obj->getIncentive(), IncentiveTest::getObject());
        self::assertEquals($obj->getExternalFunding(), ExternalFundingTest::getObject());
        self::assertEquals($obj->getCarrierAccountToken(), CarrierAccountTokenTest::getObject());
        self::assertEquals($obj->getCarrierAccount(), CarrierAccountTest::getObject());
        self::assertEquals($obj->getPrivateLabelCard(), PrivateLabelCardTest::getObject());
        self::assertEquals($obj->getBilling(), BillingTest::getObject());
    }
}
