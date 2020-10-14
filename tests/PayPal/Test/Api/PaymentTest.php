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
    public static function getJson()
    {
        return '{"id":"TestSample","intent":"TestSample","payer":' . PayerTest::getJson() . ',"potential_payer_info":' . PotentialPayerInfoTest::getJson() . ',"payee":' . PayeeTest::getJson() . ',"cart":"TestSample","transactions":[' . TransactionTest::getJson() . '],"failed_transactions":' . ErrorTest::getJson() . ',"billing_agreement_tokens":["TestSample"],"credit_financing_offered":' . CreditFinancingOfferedTest::getJson() . ',"payment_instruction":' . PaymentInstructionTest::getJson() . ',"state":"TestSample","experience_profile_id":"TestSample","note_to_payer":"TestSample","redirect_urls":' . RedirectUrlsTest::getJson() . ',"failure_reason":"TestSample","create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payment
     */
    public static function getObject()
    {
        return new Payment(self::getJson());
    }

    public function testGetToken_returnsNullIfApprovalLinkNull()
    {
        $payment = new Payment();
        $token = $payment->getToken();
        self::assertNull($token);
    }

    public function testGetToken_returnsNullIfApprovalLinkDoesNotHaveToken()
    {
        $payment = new Payment('{"links": [ { "href": "https://api.sandbox.paypal.com/v1/payments//cgi-bin/webscr?cmd=_express-checkout", "rel": "approval_url", "method": "REDIRECT" } ]}');
        $token = $payment->getToken();
        self::assertNull($token);
    }

    public function testGetToken_returnsNullIfApprovalLinkHasAToken()
    {
        $payment = new Payment('{"links": [ { "href": "https://api.sandbox.paypal.com/v1/payments//cgi-bin/webscr?cmd=_express-checkout&token=EC-60385559L1062554J", "rel": "approval_url", "method": "REDIRECT" } ]}');
        $token = $payment->getToken();
        self::assertNotNull($token);
        self::assertEquals('EC-60385559L1062554J', $token);
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payment
     */
    public function testSerializationDeserialization()
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
    public function testGetters($obj)
    {
        self::assertEquals("TestSample", $obj->getId());
        self::assertEquals("TestSample", $obj->getIntent());
        self::assertEquals($obj->getPayer(), PayerTest::getObject());
        self::assertEquals($obj->getPotentialPayerInfo(), PotentialPayerInfoTest::getObject());
        self::assertEquals($obj->getPayee(), PayeeTest::getObject());
        self::assertEquals("TestSample", $obj->getCart());
        self::assertEquals($obj->getTransactions(), array(TransactionTest::getObject()));
        self::assertEquals($obj->getFailedTransactions(), ErrorTest::getObject());
        self::assertEquals(array("TestSample"), $obj->getBillingAgreementTokens());
        self::assertEquals($obj->getCreditFinancingOffered(), CreditFinancingOfferedTest::getObject());
        self::assertEquals($obj->getPaymentInstruction(), PaymentInstructionTest::getObject());
        self::assertEquals("TestSample", $obj->getState());
        self::assertEquals("TestSample", $obj->getExperienceProfileId());
        self::assertEquals("TestSample", $obj->getNoteToPayer());
        self::assertEquals($obj->getRedirectUrls(), RedirectUrlsTest::getObject());
        self::assertEquals("TestSample", $obj->getFailureReason());
        self::assertEquals("TestSample", $obj->getCreateTime());
        self::assertEquals("TestSample", $obj->getUpdateTime());
        self::assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));

        $result = $obj->get("paymentId", $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    true
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testExecute($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    self::getJson()
            ));
        $paymentExecution = PaymentExecutionTest::getObject();

        $result = $obj->execute($paymentExecution, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testList($obj, $mockApiContext)
    {
        $mockPPRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects(self::any())
            ->method('execute')
            ->will(self::returnValue(
                    PaymentHistoryTest::getJson()
            ));
        $params = array();

        $result = $obj->all($params, $mockApiContext, $mockPPRestCall);
        self::assertNotNull($result);
    }

    public function mockProvider()
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
