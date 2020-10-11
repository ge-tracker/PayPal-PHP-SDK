<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;

/**
 * Class PaymentCard
 *
 * A payment card that can fund a payment.
 *
 * @package PayPal\Api
 *
 * @property string id
 * @property string number
 * @property string type
 * @property string expire_month
 * @property string expire_year
 * @property string start_month
 * @property string start_year
 * @property string cvv2
 * @property string first_name
 * @property string last_name
 * @property string billing_country
 * @property \PayPal\Api\Address billing_address
 * @property string external_customer_id
 * @property string status
 * @property string card_product_class
 * @property string valid_until
 * @property string issue_number
 * @property \PayPal\Api\Links[] links
 */
class PaymentCard extends PayPalModel
{
    /**
     * The ID of a credit card to save for later use.
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
     * The ID of a credit card to save for later use.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The card number.
     *
     * @param string $number
     *
     * @return $this
     */
    public function setNumber($number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * The card number.
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * The card type.
     * Valid Values: ["VISA", "AMEX", "SOLO", "JCB", "STAR", "DELTA", "DISCOVER", "SWITCH", "MAESTRO", "CB_NATIONALE", "CONFINOGA", "COFIDIS", "ELECTRON", "CETELEM", "CHINA_UNION_PAY", "MASTERCARD"]
     *
     * @param string $type
     *
     * @return $this
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * The card type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The two-digit expiry month for the card.
     *
     * @param string $expire_month
     *
     * @return $this
     */
    public function setExpireMonth($expire_month): self
    {
        $this->expire_month = $expire_month;
        return $this;
    }

    /**
     * The two-digit expiry month for the card.
     *
     * @return string
     */
    public function getExpireMonth(): string
    {
        return $this->expire_month;
    }

    /**
     * The four-digit expiry year for the card.
     *
     * @param string $expire_year
     *
     * @return $this
     */
    public function setExpireYear($expire_year): self
    {
        $this->expire_year = $expire_year;
        return $this;
    }

    /**
     * The four-digit expiry year for the card.
     *
     * @return string
     */
    public function getExpireYear(): string
    {
        return $this->expire_year;
    }

    /**
     * The two-digit start month for the card. Required for UK Maestro cards.
     *
     * @param string $start_month
     *
     * @return $this
     */
    public function setStartMonth($start_month): self
    {
        $this->start_month = $start_month;
        return $this;
    }

    /**
     * The two-digit start month for the card. Required for UK Maestro cards.
     *
     * @return string
     */
    public function getStartMonth(): string
    {
        return $this->start_month;
    }

    /**
     * The four-digit start year for the card. Required for UK Maestro cards.
     *
     * @param string $start_year
     *
     * @return $this
     */
    public function setStartYear($start_year): self
    {
        $this->start_year = $start_year;
        return $this;
    }

    /**
     * The four-digit start year for the card. Required for UK Maestro cards.
     *
     * @return string
     */
    public function getStartYear(): string
    {
        return $this->start_year;
    }

    /**
     * The validation code for the card. Supported for payments but not for saving payment cards for future use.
     *
     * @param string $cvv2
     *
     * @return $this
     */
    public function setCvv2($cvv2): self
    {
        $this->cvv2 = $cvv2;
        return $this;
    }

    /**
     * The validation code for the card. Supported for payments but not for saving payment cards for future use.
     *
     * @return string
     */
    public function getCvv2(): string
    {
        return $this->cvv2;
    }

    /**
     * The first name of the card holder.
     *
     * @param string $first_name
     *
     * @return $this
     */
    public function setFirstName($first_name): self
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * The first name of the card holder.
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * The last name of the card holder.
     *
     * @param string $last_name
     *
     * @return $this
     */
    public function setLastName($last_name): self
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * The last name of the card holder.
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * The two-letter country code.
     *
     * @param string $billing_country
     *
     * @return $this
     */
    public function setBillingCountry($billing_country): self
    {
        $this->billing_country = $billing_country;
        return $this;
    }

    /**
     * The two-letter country code.
     *
     * @return string
     */
    public function getBillingCountry(): string
    {
        return $this->billing_country;
    }

    /**
     * The billing address for the card.
     *
     * @param \PayPal\Api\Address $billing_address
     *
     * @return $this
     */
    public function setBillingAddress($billing_address): self
    {
        $this->billing_address = $billing_address;
        return $this;
    }

    /**
     * The billing address for the card.
     *
     * @return \PayPal\Api\Address
     */
    public function getBillingAddress(): Address
    {
        return $this->billing_address;
    }

    /**
     * The ID of the customer who owns this card account. The facilitator generates and provides this ID. Required when you create or use a stored funding instrument in the PayPal vault.
     *
     * @param string $external_customer_id
     *
     * @return $this
     */
    public function setExternalCustomerId($external_customer_id): self
    {
        $this->external_customer_id = $external_customer_id;
        return $this;
    }

    /**
     * The ID of the customer who owns this card account. The facilitator generates and provides this ID. Required when you create or use a stored funding instrument in the PayPal vault.
     *
     * @return string
     */
    public function getExternalCustomerId(): string
    {
        return $this->external_customer_id;
    }

    /**
     * The state of the funding instrument.
     * Valid Values: ["EXPIRED", "ACTIVE"]
     *
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * The state of the funding instrument.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * The product class of the financial instrument issuer.
     * Valid Values: ["CREDIT", "DEBIT", "GIFT", "PAYPAL_PREPAID", "PREPAID", "UNKNOWN"]
     *
     * @param string $card_product_class
     *
     * @return $this
     */
    public function setCardProductClass($card_product_class): self
    {
        $this->card_product_class = $card_product_class;
        return $this;
    }

    /**
     * The product class of the financial instrument issuer.
     *
     * @return string
     */
    public function getCardProductClass(): string
    {
        return $this->card_product_class;
    }

    /**
     * The date and time until when this instrument can be used fund a payment.
     *
     * @param string $valid_until
     *
     * @return $this
     */
    public function setValidUntil($valid_until): self
    {
        $this->valid_until = $valid_until;
        return $this;
    }

    /**
     * The date and time until when this instrument can be used fund a payment.
     *
     * @return string
     */
    public function getValidUntil(): string
    {
        return $this->valid_until;
    }

    /**
     * The one- to two-digit card issue number. Required for UK Maestro cards.
     *
     * @param string $issue_number
     *
     * @return $this
     */
    public function setIssueNumber($issue_number): self
    {
        $this->issue_number = $issue_number;
        return $this;
    }

    /**
     * The one- to two-digit card issue number. Required for UK Maestro cards.
     *
     * @return string
     */
    public function getIssueNumber(): string
    {
        return $this->issue_number;
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
