<?php

namespace PayPal\Test\Api;

use PayPal\Api\OpenIdUserinfo;
use PayPal\Exception\PayPalConnectionException;
use PHPUnit\Framework\TestCase;

/**
 * Test class for OpenIdUserinfo.
 */
class OpenIdUserinfoTest extends TestCase
{
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

    public function testSerializationDeserialization()
    {
        $user = new OpenIdUserinfo();
        $user->setAccountType('PERSONAL')->setAgeRange('20-30')->setBirthday('1970-01-01')
            ->setEmail('me@email.com')->setEmailVerified(true)
            ->setFamilyName('Doe')->setMiddleName('A')->setGivenName('John')
            ->setLocale('en-US')->setGender('male')->setName('John A Doe')
            ->setPayerId('A-XZASASA')->setPhoneNumber('1-408-111-1111')
            ->setPicture('http://gravatar.com/me.jpg')
            ->setSub('me@email.com')->setUserId('userId')
            ->setVerified(true)->setVerifiedAccount(true)
            ->setZoneinfo('America/PST')->setLanguage('en_US')
            ->setAddress(OpenIdAddressTest::getTestData());

        $userCopy = new OpenIdUserinfo();
        $userCopy->fromJson($user->toJSON());

        self::assertEquals($user, $userCopy);
    }

    public function testInvalidParamUserInfoCall()
    {
        $this->expectException(PayPalConnectionException::class);
        OpenIdUserinfo::getUserinfo(['access_token' => 'accessToken']);
    }
}
