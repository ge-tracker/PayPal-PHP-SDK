<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class FundingSource
 *
 * specifies the funding source details.
 *
 * @package PayPal\Api
 *
 * @property string funding_mode
 * @property string funding_instrument_type
 * @property string soft_descriptor
 * @property \PayPal\Api\Currency amount
 * @property \PayPal\Api\Currency negative_balance_amount
 * @property string legal_text
 * @property \PayPal\Api\FundingDetail funding_detail
 * @property string additional_text
 * @property \PayPal\Api\Links[] links
 */
class FundingSource extends FundingInstrument
{
    /**
     * specifies funding mode of the instrument
     * Valid Values: ["INSTANT_TRANSFER", "MANUAL_BANK_TRANSFER", "DELAYED_TRANSFER", "ECHECK", "PAY_UPON_INVOICE"]
     *
     * @param string $funding_mode
     *
     * @return $this
     */
    public function setFundingMode($funding_mode): self
    {
        $this->funding_mode = $funding_mode;
        return $this;
    }

    /**
     * specifies funding mode of the instrument
     *
     * @return string
     */
    public function getFundingMode(): string
    {
        return $this->funding_mode;
    }

    /**
     * Instrument type for this funding source
     * Valid Values: ["BALANCE", "PAYMENT_CARD", "BANK_ACCOUNT", "CREDIT", "INCENTIVE", "EXTERNAL_FUNDING", "TAB"]
     *
     * @param string $funding_instrument_type
     *
     * @return $this
     */
    public function setFundingInstrumentType($funding_instrument_type): self
    {
        $this->funding_instrument_type = $funding_instrument_type;
        return $this;
    }

    /**
     * Instrument type for this funding source
     *
     * @return string
     */
    public function getFundingInstrumentType(): string
    {
        return $this->funding_instrument_type;
    }

    /**
     * Soft descriptor used when charging this funding source.
     *
     * @param string $soft_descriptor
     *
     * @return $this
     */
    public function setSoftDescriptor($soft_descriptor): self
    {
        $this->soft_descriptor = $soft_descriptor;
        return $this;
    }

    /**
     * Soft descriptor used when charging this funding source.
     *
     * @return string
     */
    public function getSoftDescriptor(): string
    {
        return $this->soft_descriptor;
    }

    /**
     * Total anticipated amount of money to be pulled from instrument.
     *
     * @param \PayPal\Api\Currency $amount
     *
     * @return $this
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Total anticipated amount of money to be pulled from instrument.
     *
     * @return \PayPal\Api\Currency
     */
    public function getAmount(): Currency
    {
        return $this->amount;
    }

    /**
     * Additional amount to be pulled from the instrument to recover a negative balance on the buyer's account that is owed to PayPal.
     *
     * @param \PayPal\Api\Currency $negative_balance_amount
     *
     * @return $this
     */
    public function setNegativeBalanceAmount($negative_balance_amount): self
    {
        $this->negative_balance_amount = $negative_balance_amount;
        return $this;
    }

    /**
     * Additional amount to be pulled from the instrument to recover a negative balance on the buyer's account that is owed to PayPal.
     *
     * @return \PayPal\Api\Currency
     */
    public function getNegativeBalanceAmount(): Currency
    {
        return $this->negative_balance_amount;
    }

    /**
     * Localized legal text relevant to funding source.
     *
     * @param string $legal_text
     *
     * @return $this
     */
    public function setLegalText($legal_text): self
    {
        $this->legal_text = $legal_text;
        return $this;
    }

    /**
     * Localized legal text relevant to funding source.
     *
     * @return string
     */
    public function getLegalText(): string
    {
        return $this->legal_text;
    }

    /**
     * Additional detail of the funding.
     *
     * @param \PayPal\Api\FundingDetail $funding_detail
     *
     * @return $this
     */
    public function setFundingDetail($funding_detail): self
    {
        $this->funding_detail = $funding_detail;
        return $this;
    }

    /**
     * Additional detail of the funding.
     *
     * @return \PayPal\Api\FundingDetail
     */
    public function getFundingDetail(): FundingDetail
    {
        return $this->funding_detail;
    }

    /**
     * Additional text relevant to funding source.
     *
     * @param string $additional_text
     *
     * @return $this
     */
    public function setAdditionalText($additional_text): self
    {
        $this->additional_text = $additional_text;
        return $this;
    }

    /**
     * Additional text relevant to funding source.
     *
     * @return string
     */
    public function getAdditionalText(): string
    {
        return $this->additional_text;
    }

    /**
     * Sets Extends
     *
     * @param \PayPal\Api\FundingInstrument $extends
     *
     * @deprecated Unused
     *
     * @return $this
     */
    public function setExtends($extends): self
    {
        $this->extends = $extends;
        return $this;
    }

    /**
     * Gets Extends
     *
     * @deprecated Unused
     *
     * @return \PayPal\Api\FundingInstrument
     */
    public function getExtends(): FundingInstrument
    {
        return $this->extends;
    }

    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
     *
     * @return $this
     */
    public function setLinks($links): self
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links): ?self
    {
        if (!$this->getLinks()) {
            return $this->setLinks(array($links));
        } else {
            return $this->setLinks(
                array_merge($this->getLinks(), array($links))
            );
        }
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links): self
    {
        return $this->setLinks(
            array_diff($this->getLinks(), array($links))
        );
    }

}
