<?php

use PayPal\Rest\ApiContext;
use PHPUnit\Framework\TestCase;

/**
 * Test class for ApiContextTest.
 */
class ApiContextTest extends TestCase
{
    /**
     * @var ApiContext
     */
    public $apiContext;

    protected function setUp(): void
    {
        $this->apiContext = new ApiContext();
    }

    public function testGetRequestId()
    {
        $requestId = $this->apiContext->getRequestId();
        self::assertNull($requestId);
    }

    public function testSetRequestId()
    {
        self::assertNull($this->apiContext->getRequestId());

        $expectedRequestId = 'random-value';
        $this->apiContext->setRequestId($expectedRequestId);
        $requestId = $this->apiContext->getRequestId();
        self::assertEquals($expectedRequestId, $requestId);
    }

    public function testResetRequestId()
    {
        self::assertNull($this->apiContext->getRequestId());

        $requestId = $this->apiContext->resetRequestId();
        self::assertNotNull($requestId);

        // Tests that another resetRequestId call will generate a new ID
        $newRequestId = $this->apiContext->resetRequestId();
        self::assertNotNull($newRequestId);
        self::assertNotEquals($newRequestId, $requestId);
    }
}
