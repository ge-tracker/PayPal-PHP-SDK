<?php

namespace PayPal\Api;

use PayPal\Common\PayPalModel;
use PayPal\Validation\UrlValidator;

/**
 * Class RedirectUrls
 *
 * Set of redirect URLs you provide only for PayPal-based payments.
 *
 * @package PayPal\Api
 *
 * @property string return_url
 * @property string cancel_url
 */
class RedirectUrls extends PayPalModel
{
    /**
     * Url where the payer would be redirected to after approving the payment. **Required for PayPal account payments.**
     *
     * @param string $return_url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setReturnUrl($return_url): self
    {
        UrlValidator::validate($return_url, "ReturnUrl");
        $this->return_url = $return_url;
        return $this;
    }

    /**
     * Url where the payer would be redirected to after approving the payment. **Required for PayPal account payments.**
     *
     * @return string
     */
    public function getReturnUrl(): string
    {
        return $this->return_url;
    }

    /**
     * Url where the payer would be redirected to after canceling the payment. **Required for PayPal account payments.**
     *
     * @param string $cancel_url
     * @throws \InvalidArgumentException
     * @return $this
     */
    public function setCancelUrl($cancel_url): self
    {
        UrlValidator::validate($cancel_url, "CancelUrl");
        $this->cancel_url = $cancel_url;
        return $this;
    }

    /**
     * Url where the payer would be redirected to after canceling the payment. **Required for PayPal account payments.**
     *
     * @return string
     */
    public function getCancelUrl(): string
    {
        return $this->cancel_url;
    }

}
