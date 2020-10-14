<?php

namespace PayPal\Test\Handler;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Core\PayPalHttpConfig;
use PayPal\Handler\OauthHandler;
use PayPal\Rest\ApiContext;
use PHPUnit\Framework\TestCase;

class OauthHandlerTest extends TestCase
{
    /**
     * @var \PayPal\Handler\OauthHandler
     */
    public $handler;

    /**
     * @var PayPalHttpConfig
     */
    public $httpConfig;

    /**
     * @var ApiContext
     */
    public $apiContext;

    /**
     * @var array
     */
    public $config;

    protected function setUp(): void
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                'clientId',
                'clientSecret'
            )
        );
    }

    public function modeProvider()
    {
        return [
            [['mode' => 'sandbox']],
            [['mode' => 'live']],
            [['mode' => 'sandbox', 'oauth.EndPoint' => 'http://localhost/']],
            [['mode' => 'sandbox', 'service.EndPoint' => 'http://service.localhost/']],
        ];
    }

    /**
     * @dataProvider modeProvider
     *
     * @param $configs
     */
    public function testGetEndpoint($configs)
    {
        $config = $configs + [
            'cache.enabled'        => true,
            'http.headers.header1' => 'header1value',
        ];
        $this->apiContext->setConfig($config);
        $this->setConfig();
        $this->httpConfig = new PayPalHttpConfig(null, 'POST', $config);
        $this->handler = new OauthHandler($this->apiContext);
        $this->handler->handle($this->httpConfig, null, $this->config);

        $apiConfig = $this->handler->getApiContext()->getConfig();
        $apiCredential = $this->handler->getApiContext()->getCredential();
        $apiRequestHeaders = $this->handler->getApiContext()->getRequestHeaders();
        $apiRequestId = $this->handler->getApiContext()->getRequestId();

        self::assertSame($config['mode'], $apiConfig['mode']);
        self::assertTrue($apiConfig['cache.enabled']);
    }

    private function setConfig()
    {
        $config = $this->apiContext->getConfig();

        $this->config = [
            'clientId'     => $config['acct1.ClientId'],
            'clientSecret' => $config['acct1.ClientSecret'],
        ];
    }
}
