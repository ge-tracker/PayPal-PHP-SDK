<?php

namespace PayPal\Test\Auth;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Cache\AuthorizationCache;
use PayPal\Core\PayPalConfigManager;
use PayPal\Rest\ApiContext;
use PayPal\Test\Cache\AuthorizationCacheTest;
use PayPal\Test\Constants;
use PHPUnit\Framework\TestCase;

class OAuthTokenCredentialTest extends TestCase
{

    /**
     * @group integration
     */
    public function testGetAccessToken(): void
    {
        $cred = new OAuthTokenCredential(Constants::CLIENT_ID, Constants::CLIENT_SECRET);
        self::assertEquals(Constants::CLIENT_ID, $cred->getClientId());
        self::assertEquals(Constants::CLIENT_SECRET, $cred->getClientSecret());
        $config = PayPalConfigManager::getInstance()->getConfigHashmap();
        $token = $cred->getAccessToken($config);
        self::assertNotNull($token);

        // Check that we get the same token when issuing a new call before token expiry
        $newToken = $cred->getAccessToken($config);
        self::assertNotNull($newToken);
        self::assertEquals($token, $newToken);
    }

    /**
     * @group integration
     */
    public function testInvalidCredentials(): void
    {
        $this->setExpectedException('PayPal\Exception\PayPalConnectionException');
        $cred = new OAuthTokenCredential('dummy', 'secret');
        self::assertNull($cred->getAccessToken(PayPalConfigManager::getInstance()->getConfigHashmap()));
    }

    public function testGetAccessTokenUnit(): void
    {
        $config = array(
            'mode' => 'sandbox',
            'cache.enabled' => true,
            'cache.FileName' => AuthorizationCacheTest::CACHE_FILE
        );
        $cred = new OAuthTokenCredential('clientId', 'clientSecret');

        //{"clientId":{"clientId":"clientId","accessToken":"accessToken","tokenCreateTime":1421204091,"tokenExpiresIn":288000000}}
        AuthorizationCache::push($config, 'clientId', $cred->encrypt('accessToken'), 1421204091, 288000000);

        $apiContext = new ApiContext($cred);
        $apiContext->setConfig($config);
        self::assertEquals('clientId', $cred->getClientId());
        self::assertEquals('clientSecret', $cred->getClientSecret());
        $result = $cred->getAccessToken($config);
        self::assertNotNull($result);
    }

    public function testGetAccessTokenUnitMock(): void
    {
        $config = array(
            'mode' => 'sandbox'
        );
        /** @var OAuthTokenCredential $auth */
        $auth = $this->getMockBuilder('\PayPal\Auth\OAuthTokenCredential')
            ->setConstructorArgs(array('clientId', 'clientSecret'))
            ->setMethods(array('getToken'))
            ->getMock();

        $auth->expects(self::any())
            ->method('getToken')
            ->willReturn(['refresh_token' => 'refresh_token_value']);
        $response = $auth->getRefreshToken($config, 'auth_value');
        self::assertNotNull($response);
        self::assertEquals('refresh_token_value', $response);
    }

    public function testUpdateAccessTokenUnitMock(): void
    {
        $config = array(
            'mode' => 'sandbox'
        );
        /** @var OAuthTokenCredential $auth */
        $auth = $this->getMockBuilder('\PayPal\Auth\OAuthTokenCredential')
            ->setConstructorArgs(array('clientId', 'clientSecret'))
            ->setMethods(array('getToken'))
            ->getMock();

        $auth->expects(self::any())
            ->method('getToken')
            ->willReturn(array(
                'access_token' => 'accessToken',
                'expires_in'   => 280
            ));

        $response = $auth->updateAccessToken($config);
        self::assertNotNull($response);
        self::assertEquals('accessToken', $response);

        $response = $auth->updateAccessToken($config, 'refresh_token');
        self::assertNotNull($response);
        self::assertEquals('accessToken', $response);
    }

    /**
     * @expectedException \PayPal\Exception\PayPalConnectionException
     * @expectedExceptionMessage Could not generate new Access token. Invalid response from server:
     */
    public function testUpdateAccessTokenNullReturnUnitMock(): void
    {
        $config = array(
            'mode' => 'sandbox'
        );
        /** @var OAuthTokenCredential $auth */
        $auth = $this->getMockBuilder('\PayPal\Auth\OAuthTokenCredential')
            ->setConstructorArgs(array('clientId', 'clientSecret'))
            ->setMethods(array('getToken'))
            ->getMock();

        $auth->expects(self::any())
            ->method('getToken')
            ->willReturn(array());

        $response = $auth->updateAccessToken($config);
        self::assertNotNull($response);
        self::assertEquals('accessToken', $response);
    }
}
