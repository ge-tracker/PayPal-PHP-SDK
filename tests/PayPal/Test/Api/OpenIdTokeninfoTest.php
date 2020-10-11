<?php
namespace PayPal\Test\Api;

use PayPal\Api\OpenIdTokeninfo;
use PHPUnit\Framework\TestCase;

/**
 * Test class for OpenIdTokeninfo.
 *
 */
class OpenIdTokeninfoTest extends TestCase
{

    /** @var  OpenIdTokeninfo */
    public $token;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void    {
        $this->token = new OpenIdTokeninfo();
        $this->token->setAccessToken("Access token")
            ->setExpiresIn(900)
            ->setRefreshToken("Refresh token")
            ->setIdToken("id token")
            ->setScope("openid address")
            ->setTokenType("Bearer");
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    /**
     */
    public function testSerializationDeserialization(): void
    {
        $tokenCopy = new OpenIdTokeninfo();
        $tokenCopy->fromJson($this->token->toJson());

        self::assertEquals($this->token, $tokenCopy);
    }

    /**
     * @t1est
     * TODO: Fix Test. This test is disabled
     */
    public function t1estOperations(): void
    {
        $clientId = 'AQkquBDf1zctJOWGKWUEtKXm6qVhueUEMvXO_-MCI4DQQ4-LWvkDLIN2fGsd';
        $clientSecret = 'ELtVxAjhT7cJimnz5-Nsx9k2reTKSVfErNQF-CmrwJgxRtylkGTKlU4RvrX';

        $params = array(
            'code' => '<FILLME>',
            'redirect_uri' => 'https://devtools-paypal.com/',
            'client_id' => $clientId,
            'client_secret' => $clientSecret
        );
        $accessToken = OpenIdTokeninfo::createFromAuthorizationCode($params);
        self::assertNotNull($accessToken);

        $params = array(
            'refresh_token' => $accessToken->getRefreshToken(),
            'client_id' => $clientId,
            'client_secret' => $clientSecret
        );
        $accessToken = $accessToken->createFromRefreshToken($params);
        self::assertNotNull($accessToken);
    }
}
