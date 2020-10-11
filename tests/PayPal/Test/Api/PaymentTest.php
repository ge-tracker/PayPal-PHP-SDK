<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payment;
use PHPUnit\Framework\TestCase;

/**
 * Class Payment
 *
 * @package PayPal\Test\Api
 */
class PaymentTest extends TestCase
{
    /**
     * Gets Json String of Object Payment
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","intent":"TestSample","payer":' . PayerTest::getJson() . ',"potential_payer_info":' . PotentialPayerInfoTest::getJson() . ',"payee":' . PayeeTest::getJson() . ',"cart":"TestSample","transactions":[' . TransactionTest::getJson() . '],"failed_transactions":' . ErrorTest::getJson() . ',"billing_agreement_tokens":["TestSample"],"credit_financing_offered":' . CreditFinancingOfferedTest::getJson() . ',"payment_instruction":' . PaymentInstructionTest::getJson() . ',"state":"TestSample","experience_profile_id":"TestSample","note_to_payer":"TestSample","redirect_urls":' . RedirectUrlsTest::getJson() . ',"failure_reason":"TestSample","create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payment
     */
    public static function getObject(): Payment
    {
        return new Payment(self::getJson());
    }

    public function testGetToken_returnsNullIfApprovalLinkNull(): void
    {
        $payment = new Payment();
        $token = $payment->getToken();
        self::assertNull($token);
    }

    public function testGetToken_returnsNullIfApprovalLinkDoesNotHaveToken(): void
    {
        $payment = new Payment('{"links": [ { "href": "https://api.sandbox.paypal.com/v1/payments//cgi-bin/webscr?cmd=_express-checkout", "rel": "approval_url", "method": "REDIRECT" } ]}');
        $token = $payment->getToken();
        self::assertNull($token);
    }

    public function testGetToken_returnsNullIfApprovalLinkHasAToken(): void
    {
        $payment = new Payment('{"links": [ { "href": "https://api.sandbox.paypal.com/v1/payments//cgi-bin/webscr?cmd=_express-checkout&token=EC-60385559L1062554J", "rel": "approval_url", "method": "REDIRECT" } ]}');
        $token = $payment->getToken();
        self::assertNotNull($token);
        self::assertEquals($token, 'EC-60385559L1062554J');
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payment
     */
    public function testSerializationDeserialization(): Payment
    {
        $obj = new Payment(self::getJson());
        self::assertNotNull($obj);
        self::assertNotNull($obj->getId());
        self::assertNotNull($obj->getIntent());
        self::assertNotNull($obj->getPayer());
        self::assertNotNull($obj->getPotentialPayerInfo());
        self::assertNotNull($obj->getPayee());
        self::assertNotNull($obj->getCart());
        self::assertNotNull($obj->getTransactions());
        self::assertNotNull($obj->getFailedTransactions());
        self::assertNotNull($obj->getBillingAgreementTokens());
        self::assertNotNull($obj->getCreditFinancingOffered());
        self::assertNotNull($obj->getPaymentInstruction());
        self::assertNotNull($obj->getState());
        self::assertNotNull($obj->getExperienceProfileId());
        self::assertNotNull($obj->getNoteToPayer());
        self::assertNotNull($obj->getRedirectUrls());
        self::assertNotNull($obj->getFailureReason());
        self::assertNotNull($obj->getCreateTime());
        self::assertNotNull($obj->getUpdateTime());
        self::assertNotNull($obj->getLinks());
        self::assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payment $obj
     */
    public function testGetters($obj): void
    {
        self::assertEquals($obj->getId(), "TestSample");
        self::assertEquals($obj->getIntent(), "TestSample");
        self::assertEquals($obj->getPayer(), PayerTest::getObject());
        self::assertEquals($obj->getPotentialPayerInfo(), PotentialPayerInfoTest::getObject());
        self::assertEquals($obj->getPayee(), PayeeTest::getObject());
        self::assertEquals($obj->getCart(), "TestSample");
        self::assertEquals($obj->getTransactions(), array(TransactionTest::getObject()));
        self::assertEquals($obj->getFailedTransactions(), ErrorTest::getObject());
        self::assertEquals($obj->getBillingAgreementTokens(), array("TestSample"));
        self::assertEquals($obj->getCreditFinancingOffered(), CreditFinancingOfferedTest::getObject());
        self::assertEquals($obj->getPaymentInstruction(), PaymentInstructionTest::getObject());
        self::assertEquals($obj->getState(), "TestSample");
        self::assertEquals($obj->getExperienceProfileId(), "TestSample");
        self::assertEquals($obj->getNoteToPayer(), "TestSample");
        self::assertEquals($obj->getRedirectUrls(), RedirectUrlsTest::getObject());
        self::assertEquals($obj->getFailureReason(), "TestSample");
        self::assertEquals($obj->getCreateTime(), "TestSample");
        self::assertEquals($obj->getUpdateTime(), "TestSample");
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testCreate($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testGet($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PaymentTest::getJson());

        $result = $obj->get("paymentId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testUpdate($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(true);
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testExecute($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(self::getJson());
        $paymentExecution = PaymentExecutionTest::getObject();

        $result = $obj->execute($paymentExecution, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testList($obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->willReturn(PaymentHistoryTest::getJson());
        $params = array();

        $result = $obj->all($params, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider(): array
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();
        return array(
            array($obj, $mockApiContext),
            array($obj, null)
        );
    }
}
