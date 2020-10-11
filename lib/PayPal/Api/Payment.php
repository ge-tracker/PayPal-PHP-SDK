<?php

namespace PayPal\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Core\PayPalConstants;
use PayPal\Validation\ArgumentValidator;
use PayPal\Rest\ApiContext;

/**
 * Class Payment
 *
 * Lets you create, process and manage payments.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string intent
 * @property \PayPal\Api\Payer payer
 * @property \PayPal\Api\Transaction[] transactions
 * @property string state
 * @property string experience_profile_id
 * @property string note_to_payer
 * @property \PayPal\Api\Payee $payee
 * @property \PayPal\Api\RedirectUrls redirect_urls
 * @property string failure_reason
 * @property string create_time
 * @property string update_time
 * @property \PayPal\Api\Links[] links
 */
class Payment extends PayPalResourceModel
{
    /**
     * Identifier of the payment resource created.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Identifier of the payment resource created.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Payment intent.
     * Valid Values: ["sale", "authorize", "order"]
     *
     * @param string $intent
     *
     * @return $this
     */
    public function setIntent($intent): self
    {
        $this->intent = $intent;
        return $this;
    }

    /**
     * Payment intent.
     *
     * @return string
     */
    public function getIntent(): string
    {
        return $this->intent;
    }

    /**
     * Source of the funds for this payment represented by a PayPal account or a direct credit card.
     *
     * @param \PayPal\Api\Payer $payer
     *
     * @return $this
     */
    public function setPayer($payer): self
    {
        $this->payer = $payer;
        return $this;
    }

    /**
     * Source of the funds for this payment represented by a PayPal account or a direct credit card.
     *
     * @return \PayPal\Api\Payer
     */
    public function getPayer(): Payer
    {
        return $this->payer;
    }

    /**
     * Information that the merchant knows about the payer.  This information is not definitive and only serves as a hint to the UI or any pre-processing logic.
     * @deprecated Not publicly available
     * @param \PayPal\Api\PotentialPayerInfo $potential_payer_info
     *
     * @return $this
     */
    public function setPotentialPayerInfo($potential_payer_info): self
    {
        $this->potential_payer_info = $potential_payer_info;
        return $this;
    }

    /**
     * Information that the merchant knows about the payer.  This information is not definitive and only serves as a hint to the UI or any pre-processing logic.
     * @deprecated Not publicly available
     * @return \PayPal\Api\PotentialPayerInfo
     */
    public function getPotentialPayerInfo(): PotentialPayerInfo
    {
        return $this->potential_payer_info;
    }

    /**
     * Receiver of funds for this payment.
     * @param \PayPal\Api\Payee $payee
     *
     * @return $this
     */
    public function setPayee($payee): self
    {
        $this->payee = $payee;
        return $this;
    }

    /**
     * Receiver of funds for this payment.
     * @return \PayPal\Api\Payee
     */
    public function getPayee(): Payee
    {
        return $this->payee;
    }

    /**
     * ID of the cart to execute the payment.
     * @deprecated Not publicly available
     * @param string $cart
     *
     * @return $this
     */
    public function setCart($cart): self
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * ID of the cart to execute the payment.
     * @deprecated Not publicly available
     * @return string
     */
    public function getCart(): string
    {
        return $this->cart;
    }

    /**
     * Transactional details including the amount and item details.
     *
     * @param \PayPal\Api\Transaction[] $transactions
     *
     * @return $this
     */
    public function setTransactions($transactions): self
    {
        $this->transactions = $transactions;
        return $this;
    }

    /**
     * Transactional details including the amount and item details.
     *
     * @return \PayPal\Api\Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * Append Transactions to the list.
     *
     * @param \PayPal\Api\Transaction $transaction
     * @return $this
     */
    public function addTransaction($transaction): ?self
    {
        if (!$this->getTransactions()) {
            return $this->setTransactions(array($transaction));
        } else {
            return $this->setTransactions(
                array_merge($this->getTransactions(), array($transaction))
            );
        }
    }

    /**
     * Remove Transactions from the list.
     *
     * @param \PayPal\Api\Transaction $transaction
     * @return $this
     */
    public function removeTransaction($transaction): self
    {
        return $this->setTransactions(
            array_diff($this->getTransactions(), array($transaction))
        );
    }

    /**
     * Applicable for advanced payments like multi seller payment (MSP) to support partial failures
     * @deprecated Not publicly available
     * @param \PayPal\Api\Error[] $failed_transactions
     *
     * @return $this
     */
    public function setFailedTransactions($failed_transactions): self
    {
        $this->failed_transactions = $failed_transactions;
        return $this;
    }

    /**
     * Applicable for advanced payments like multi seller payment (MSP) to support partial failures
     * @deprecated Not publicly available
     * @return \PayPal\Api\Error[]
     */
    public function getFailedTransactions(): array
    {
        return $this->failed_transactions;
    }

    /**
     * Append FailedTransactions to the list.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Error $error
     * @return $this
     */
    public function addFailedTransaction($error): ?self
    {
        if (!$this->getFailedTransactions()) {
            return $this->setFailedTransactions(array($error));
        } else {
            return $this->setFailedTransactions(
                array_merge($this->getFailedTransactions(), array($error))
            );
        }
    }

    /**
     * Remove FailedTransactions from the list.
     * @deprecated Not publicly available
     * @param \PayPal\Api\Error $error
     * @return $this
     */
    public function removeFailedTransaction($error): self
    {
        return $this->setFailedTransactions(
            array_diff($this->getFailedTransactions(), array($error))
        );
    }

    /**
     * Collection of PayPal generated billing agreement tokens.
     * @deprecated Not publicly available
     * @param string[] $billing_agreement_tokens
     *
     * @return $this
     */
    public function setBillingAgreementTokens($billing_agreement_tokens): self
    {
        $this->billing_agreement_tokens = $billing_agreement_tokens;
        return $this;
    }

    /**
     * Collection of PayPal generated billing agreement tokens.
     * @deprecated Not publicly available
     * @return string[]
     */
    public function getBillingAgreementTokens(): array
    {
        return $this->billing_agreement_tokens;
    }

    /**
     * Append BillingAgreementTokens to the list.
     * @deprecated Not publicly available
     * @param string $billingAgreementToken
     * @return $this
     */
    public function addBillingAgreementToken($billingAgreementToken): ?self
    {
        if (!$this->getBillingAgreementTokens()) {
            return $this->setBillingAgreementTokens(array($billingAgreementToken));
        } else {
            return $this->setBillingAgreementTokens(
                array_merge($this->getBillingAgreementTokens(), array($billingAgreementToken))
            );
        }
    }

    /**
     * Remove BillingAgreementTokens from the list.
     * @deprecated Not publicly available
     * @param string $billingAgreementToken
     * @return $this
     */
    public function removeBillingAgreementToken($billingAgreementToken): self
    {
        return $this->setBillingAgreementTokens(
            array_diff($this->getBillingAgreementTokens(), array($billingAgreementToken))
        );
    }

    /**
     * Credit financing offered to payer on PayPal side. Returned in payment after payer opts-in
     * @deprecated Not publicly available
     * @param \PayPal\Api\CreditFinancingOffered $credit_financing_offered
     *
     * @return $this
     */
    public function setCreditFinancingOffered($credit_financing_offered): self
    {
        $this->credit_financing_offered = $credit_financing_offered;
        return $this;
    }

    /**
     * Credit financing offered to payer on PayPal side. Returned in payment after payer opts-in
     * @deprecated Not publicly available
     * @return \PayPal\Api\CreditFinancingOffered
     */
    public function getCreditFinancingOffered(): CreditFinancingOffered
    {
        return $this->credit_financing_offered;
    }

    /**
     * Instructions for the payer to complete this payment.
     * @deprecated Not publicly available
     * @param \PayPal\Api\PaymentInstruction $payment_instruction
     *
     * @return $this
     */
    public function setPaymentInstruction($payment_instruction): self
    {
        $this->payment_instruction = $payment_instruction;
        return $this;
    }

    /**
     * Instructions for the payer to complete this payment.
     * @deprecated Not publicly available
     * @return \PayPal\Api\PaymentInstruction
     */
    public function getPaymentInstruction(): PaymentInstruction
    {
        return $this->payment_instruction;
    }

    /**
     * The state of the payment, authorization, or order transaction. The value is:<ul><li><code>created</code>. The transaction was successfully created.</li><li><code>approved</code>. The buyer approved the transaction.</li><li><code>failed</code>. The transaction request failed.</li></ul>
     * Valid Values: ["created", "approved", "failed", "partially_completed", "in_progress"]
     *
     * @param string $state
     *
     * @return $this
     */
    public function setState($state): self
    {
        $this->state = $state;
        return $this;
    }

    /**
     * The state of the payment, authorization, or order transaction. The value is:<ul><li><code>created</code>. The transaction was successfully created.</li><li><code>approved</code>. The buyer approved the transaction.</li><li><code>failed</code>. The transaction request failed.</li></ul>
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * PayPal generated identifier for the merchant's payment experience profile. Refer to [this](https://developer.paypal.com/docs/api/#payment-experience) link to create experience profile ID.
     *
     * @param string $experience_profile_id
     *
     * @return $this
     */
    public function setExperienceProfileId($experience_profile_id): self
    {
        $this->experience_profile_id = $experience_profile_id;
        return $this;
    }

    /**
     * PayPal generated identifier for the merchant's payment experience profile. Refer to [this](https://developer.paypal.com/docs/api/#payment-experience) link to create experience profile ID.
     *
     * @return string
     */
    public function getExperienceProfileId(): string
    {
        return $this->experience_profile_id;
    }

    /**
     * free-form field for the use of clients to pass in a message to the payer
     *
     * @param string $note_to_payer
     *
     * @return $this
     */
    public function setNoteToPayer($note_to_payer): self
    {
        $this->note_to_payer = $note_to_payer;
        return $this;
    }

    /**
     * free-form field for the use of clients to pass in a message to the payer
     *
     * @return string
     */
    public function getNoteToPayer(): string
    {
        return $this->note_to_payer;
    }

    /**
     * Set of redirect URLs you provide only for PayPal-based payments.
     *
     * @param \PayPal\Api\RedirectUrls $redirect_urls
     *
     * @return $this
     */
    public function setRedirectUrls($redirect_urls): self
    {
        $this->redirect_urls = $redirect_urls;
        return $this;
    }

    /**
     * Set of redirect URLs you provide only for PayPal-based payments.
     *
     * @return \PayPal\Api\RedirectUrls
     */
    public function getRedirectUrls(): RedirectUrls
    {
        return $this->redirect_urls;
    }

    /**
     * Failure reason code returned when the payment failed for some valid reasons.
     * Valid Values: ["UNABLE_TO_COMPLETE_TRANSACTION", "INVALID_PAYMENT_METHOD", "PAYER_CANNOT_PAY", "CANNOT_PAY_THIS_PAYEE", "REDIRECT_REQUIRED", "PAYEE_FILTER_RESTRICTIONS"]
     *
     * @param string $failure_reason
     *
     * @return $this
     */
    public function setFailureReason($failure_reason): self
    {
        $this->failure_reason = $failure_reason;
        return $this;
    }

    /**
     * Failure reason code returned when the payment failed for some valid reasons.
     *
     * @return string
     */
    public function getFailureReason(): string
    {
        return $this->failure_reason;
    }

    /**
     * Payment creation time as defined in [RFC 3339 Section 5.6](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $create_time
     *
     * @return $this
     */
    public function setCreateTime($create_time): self
    {
        $this->create_time = $create_time;
        return $this;
    }

    /**
     * Payment creation time as defined in [RFC 3339 Section 5.6](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->create_time;
    }

    /**
     * Payment update time as defined in [RFC 3339 Section 5.6](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @param string $update_time
     *
     * @return $this
     */
    public function setUpdateTime($update_time): self
    {
        $this->update_time = $update_time;
        return $this;
    }

    /**
     * Payment update time as defined in [RFC 3339 Section 5.6](http://tools.ietf.org/html/rfc3339#section-5.6).
     *
     * @return string
     */
    public function getUpdateTime(): string
    {
        return $this->update_time;
    }

    /**
     * Get Approval Link
     *
     * @return null|string
     */
    public function getApprovalLink(): ?string
    {
        return $this->getLink(PayPalConstants::APPROVAL_URL);
    }

	/**
     * Get token from Approval Link
     *
     * @return null|string
     */
	public function getToken(): ?string
    {
		$parameter_name = "token";
		parse_str(parse_url($this->getApprovalLink(), PHP_URL_QUERY), $query);
		return $query[$parameter_name] ?? null;
	}

    /**
     * Creates and processes a payment. In the JSON request body, include a `payment` object with the intent, payer, and transactions. For PayPal payments, include redirect URLs in the `payment` object.
     *
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Payment
     */
    public function create($apiContext = null, $restCall = null)
    {
        $payLoad = $this->toJSON();
        $json = self::executeCall(
            "/v1/payments/payment",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * Shows details for a payment, by ID.
     *
     * @param string $paymentId
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Payment
     */
    public static function get($paymentId, $apiContext = null, $restCall = null): Payment
    {
        ArgumentValidator::validate($paymentId, 'paymentId');
        $payLoad = "";
        $json = self::executeCall(
            "/v1/payments/payment/$paymentId",
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new Payment();
        $ret->fromJson($json);
        return $ret;
    }

    /**
     * Partially updates a payment, by ID. You can update the amount, shipping address, invoice ID, and custom data. You cannot use patch after execute has been called.
     *
     * @param PatchRequest $patchRequest
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return boolean
     */
    public function update($patchRequest, $apiContext = null, $restCall = null): bool
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($patchRequest, 'patchRequest');
        $payLoad = $patchRequest->toJSON();
        self::executeCall(
            "/v1/payments/payment/{$this->getId()}",
            "PATCH",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        return true;
    }

    /**
     * Executes, or completes, a PayPal payment that the payer has approved. You can optionally update selective payment information when you execute a payment.
     *
     * @param PaymentExecution $paymentExecution
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return Payment
     */
    public function execute($paymentExecution, $apiContext = null, $restCall = null): Payment
    {
        ArgumentValidator::validate($this->getId(), "Id");
        ArgumentValidator::validate($paymentExecution, 'paymentExecution');
        $payLoad = $paymentExecution->toJSON();
        $json = self::executeCall(
            "/v1/payments/payment/{$this->getId()}/execute",
            "POST",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $this->fromJson($json);
        return $this;
    }

    /**
     * List payments that were made to the merchant who issues the request. Payments can be in any state.
     *
     * @param array $params
     * @param ApiContext $apiContext is the APIContext for this call. It can be used to pass dynamic configuration and credentials.
     * @param PayPalRestCall $restCall is the Rest Call Service that is used to make rest calls
     * @return PaymentHistory
     */
    public static function all($params, $apiContext = null, $restCall = null): PaymentHistory
    {
        ArgumentValidator::validate($params, 'params');
        $payLoad = "";
        $allowedParams = array(
                    'count' => 1,
                    'start_id' => 1,
                    'start_index' => 1,
                    'start_time' => 1,
                    'end_time' => 1,
                    'payee_id' => 1,
                    'sort_by' => 1,
                    'sort_order' => 1,
        );
        $json = self::executeCall(
            "/v1/payments/payment?" . http_build_query(array_intersect_key($params, $allowedParams)),
            "GET",
            $payLoad,
            null,
            $apiContext,
            $restCall
        );
        $ret = new PaymentHistory();
        $ret->fromJson($json);
        return $ret;
    }

}
