<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class AgreementTransactions
 *
 * A resource representing agreement_transactions that is returned during a transaction search.
 *
 * @package PayPal\Api
 *
 * @property \PayPal\Api\AgreementTransaction[] agreement_transaction_list
 */
class AgreementTransactions extends PayPalModel
{
    /**
     * Array of agreement_transaction object.
     *
     * @param \PayPal\Api\AgreementTransaction[] $agreement_transaction_list
     *
     * @return $this
     */
    public function setAgreementTransactionList($agreement_transaction_list): self
    {
        $this->agreement_transaction_list = $agreement_transaction_list;
        return $this;
    }

    /**
     * Array of agreement_transaction object.
     *
     * @return \PayPal\Api\AgreementTransaction[]
     */
    public function getAgreementTransactionList(): array
    {
        return $this->agreement_transaction_list;
    }

    /**
     * Append AgreementTransactionList to the list.
     *
     * @param \PayPal\Api\AgreementTransaction $agreementTransaction
     * @return $this
     */
    public function addAgreementTransactionList($agreementTransaction): ?self
    {
        if (!$this->getAgreementTransactionList()) {
            return $this->setAgreementTransactionList(array($agreementTransaction));
        } else {
            return $this->setAgreementTransactionList(
                array_merge($this->getAgreementTransactionList(), array($agreementTransaction))
            );
        }
    }

    /**
     * Remove AgreementTransactionList from the list.
     *
     * @param \PayPal\Api\AgreementTransaction $agreementTransaction
     * @return $this
     */
    public function removeAgreementTransactionList($agreementTransaction): self
    {
        return $this->setAgreementTransactionList(
            array_diff($this->getAgreementTransactionList(), array($agreementTransaction))
        );
    }

}
