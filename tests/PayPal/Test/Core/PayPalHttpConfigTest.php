<?php

namespace PayPal\Test\Core;

use PayPal\Core\PayPalHttpConfig;
use PayPal\Exception\PayPalConfigurationException;
use PHPUnit\Framework\TestCase;

/**
 * Test class for PayPalHttpConfigTest.
 */
class PayPalHttpConfigTest extends TestCase
{
    protected $object;

    private $config = [
        'http.ConnectionTimeOut' => '30',
        'http.Retry' => '5',
    ];

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function teatDown(): void
    {
    }

    public function testHeaderFunctions()
    {
        $o = new PayPalHttpConfig();
        $o->addHeader('key1', 'value1');
        $o->addHeader('key2', 'value');
        $o->addHeader('key2', 'overwritten');

        self::assertCount(2, $o->getHeaders());
        self::assertEquals('overwritten', $o->getHeader('key2'));
        self::assertNull($o->getHeader('key3'));

        $o = new PayPalHttpConfig();
        $o->addHeader('key1', 'value1');
        $o->addHeader('key2', 'value');
        $o->addHeader('key2', 'and more', false);

        self::assertCount(2, $o->getHeaders());
        self::assertEquals('value;and more', $o->getHeader('key2'));

        $o->removeHeader('key2');
        self::assertCount(1, $o->getHeaders());
        self::assertNull($o->getHeader('key2'));
    }

    public function testCurlOpts()
    {
        $o = new PayPalHttpConfig();
        $o->setCurlOptions(['k' => 'v']);

        $curlOpts = $o->getCurlOptions();
        self::assertCount(1, $curlOpts);
        self::assertEquals('v', $curlOpts['k']);
    }

    public function testRemoveCurlOpts()
    {
        $o = new PayPalHttpConfig();
        $o->setCurlOptions(['k' => 'v']);
        $curlOpts = $o->getCurlOptions();
        self::assertCount(1, $curlOpts);
        self::assertEquals('v', $curlOpts['k']);

        $o->removeCurlOption('k');
        $curlOpts = $o->getCurlOptions();
        self::assertCount(0, $curlOpts);
    }

    public function testUserAgent()
    {
        $ua = 'UAString';
        $o = new PayPalHttpConfig();
        $o->setUserAgent($ua);

        $curlOpts = $o->getCurlOptions();
        self::assertEquals($ua, $curlOpts[CURLOPT_USERAGENT]);
    }

    public function testSSLOpts()
    {
        $sslCert = '../cacert.pem';
        $sslPass = 'passPhrase';

        $o = new PayPalHttpConfig();
        $o->setSSLCert($sslCert, $sslPass);

        $curlOpts = $o->getCurlOptions();
        self::assertArrayHasKey(CURLOPT_SSLCERT, $curlOpts);
        self::assertEquals($sslPass, $curlOpts[CURLOPT_SSLCERTPASSWD]);
    }

    public function testProxyOpts()
    {
        $proxy = 'http://me:secret@hostname:8081';

        $o = new PayPalHttpConfig();
        $o->setHttpProxy($proxy);

        $curlOpts = $o->getCurlOptions();
        self::assertEquals('hostname:8081', $curlOpts[CURLOPT_PROXY]);
        self::assertEquals('me:secret', $curlOpts[CURLOPT_PROXYUSERPWD]);

        $this->expectException(PayPalConfigurationException::class);
        $o->setHttpProxy('invalid string');
    }
}
