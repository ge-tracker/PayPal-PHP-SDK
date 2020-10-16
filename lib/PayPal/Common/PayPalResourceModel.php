<?php

namespace PayPal\Common;

use PayPal\Handler\RestHandler;
use PayPal\Rest\ApiContext;
use PayPal\Rest\IResource;
use PayPal\Transport\PayPalRestCall;

/**
 * Class PayPalResourceModel
 * An Executable PayPalModel Class
 *
 * @property \PayPal\Api\Links[] links
 */
class PayPalResourceModel extends PayPalModel implements IResource
{
    /**
     * Sets Links
     *
     * @param \PayPal\Api\Links[] $links
     *
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * Gets Links
     *
     * @return \PayPal\Api\Links[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    public function getLink($rel)
    {
        if (is_array($this->links)) {
            foreach ($this->links as $link) {
                if ($link->getRel() == $rel) {
                    return $link->getHref();
                }
            }
        }

        return null;
    }

    /**
     * Append Links to the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function addLink($links)
    {
        if (!$this->getLinks()) {
            return $this->setLinks([$links]);
        }

        return $this->setLinks(
            array_merge($this->getLinks(), [$links])
        );
    }

    /**
     * Remove Links from the list.
     *
     * @param \PayPal\Api\Links $links
     * @return $this
     */
    public function removeLink($links)
    {
        return $this->setLinks(
            array_diff($this->getLinks(), [$links])
        );
    }

    /**
     * Build a query string parameter URL
     *
     * @param string $url
     * @param array  $params
     * @param array  $allowedParams
     *
     * @return string
     */
    protected static function buildUrl(string $url, array $params = [], array $allowedParams = []): string
    {
        return $url . '?' . http_build_query(array_intersect_key($params, $allowedParams));
    }

    /**
     * Build a JSON payload
     *
     * @param array $params
     * @param array $allowedParams
     *
     * @return string
     */
    protected static function buildJsonPayload(array $params, array $allowedParams = []): string
    {
        $filteredParams = array_intersect_key($params, $allowedParams);

        return count($filteredParams) ? json_encode($filteredParams) : '';
    }

    /**
     * Build required headers for a JSON payload.
     *
     * Code is terrible, but so is the rest of the SDK ¯\_(ツ)_/¯
     *
     * @param array $params
     * @param array $allowedParams
     *
     * @return array|null
     */
    protected static function buildJsonPayloadHeaders(array $params, array $allowedParams = []): ?array
    {
        $payload = self::buildJsonPayload($params, $allowedParams);

        return $payload === '' ? null : ['Content-Type' => 'application/json'];
    }

    /**
     * Execute SDK Call to Paypal services
     *
     * @param string      $url
     * @param string      $method
     * @param string      $payLoad
     * @param array $headers
     * @param ApiContext|null      $apiContext
     * @param PayPalRestCall|null      $restCall
     * @param array $handlers
     * @return string json response of the object
     */
    protected static function executeCall($url, $method, $payLoad, $headers = [], $apiContext = null, $restCall = null, $handlers = [RestHandler::class])
    {
        //Initialize the context and rest call object if not provided explicitly
        $apiContext = $apiContext ?: new ApiContext(self::$credential);
        $restCall = $restCall ?: new PayPalRestCall($apiContext);

        //Make the execution call
        return $restCall->execute($handlers, $url, $method, $payLoad, $headers);
    }

    /**
     * Updates Access Token using long lived refresh token
     *
     * @param string|null $refreshToken
     * @param ApiContext|null $apiContext
     * @return void
     */
    public function updateAccessToken($refreshToken, $apiContext)
    {
        $apiContext = $apiContext ?: new ApiContext(self::$credential);
        $apiContext->getCredential()->updateAccessToken($apiContext->getConfig(), $refreshToken);
    }
}
