<?php
use PayPal\Core\PayPalLoggingManager;
use PHPUnit\Framework\TestCase;

/**
 * Test class for PayPalLoggingManager.
 *
 */
class PayPalLoggingManagerTest extends TestCase
{
    /**
     * @var PayPalLoggingManager
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void    {
        $this->object = PayPalLoggingManager::getInstance('InvoiceTest');
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
    public function testError(): void
    {
        $this->object->error('Test Error Message');
    }

    /**
     */
    public function testWarning(): void
    {
        $this->object->warning('Test Warning Message');
    }

    /**
     */
    public function testInfo(): void
    {
        $this->object->info('Test info Message');
    }

    /**
     */
    public function testFine(): void
    {
        $this->object->fine('Test fine Message');
    }
}
