<?php
namespace PayPal\Test\Api;

use PayPal\Api\OpenIdAddress;
use PHPUnit\Framework\TestCase;

/**
 * Test class for OpenIdAddress.
 *
 */
class OpenIdAddressTest extends TestCase
{

    /** @var  OpenIdAddress */
    private $addr;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->addr = self::getTestData();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function teatDown(): void
    {

    }

    public static function getTestData()
    {
        $addr = new OpenIdAddress();
        $addr->setCountry("US")->setLocality("San Jose")
                ->setPostalCode("95112")->setRegion("CA")
                ->setStreetAddress("1, North 1'st street");
        return $addr;
    }

    /**
     * @test
     */
    public function testSerializationDeserialization()
    {
        $addrCopy = new OpenIdAddress();
        $addrCopy->fromJson($this->addr->toJson());

        self::assertEquals($this->addr, $addrCopy);
    }

}
