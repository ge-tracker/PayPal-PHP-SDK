<?php

namespace PayPal\Test\Functional\Api;

use PayPal\Api\Payout;
use PayPal\Api\PayoutBatch;
use PayPal\Api\PayoutItem;
use PayPal\Test\Functional\Setup;
use PHPUnit\Framework\TestCase;

/**
 * Class Payouts
 */
class PayoutsFunctionalTest extends TestCase
{
    public $operation;

    public $response;

    public $mockPayPalRestCall;

    public $apiContext;

    public static $batchId;

    protected function setUp(): void
    {
        $className = $this->getClassName();
        $testName = $this->getName();
        $operationString = file_get_contents(__DIR__ . "/../resources/$className/$testName.json");
        $this->operation = json_decode($operationString, true);
        $this->response = true;
        if (array_key_exists('body', $this->operation['response'])) {
            $this->response = json_encode($this->operation['response']['body']);
        }

        Setup::SetUpForFunctionalTests($this);
    }

    /**
     * Returns just the classname of the test you are executing. It removes the namespaces.
     * @return string
     */
    public function getClassName()
    {
        return implode('', array_slice(explode('\\', get_class($this)), -1));
    }

    public function testCreate()
    {
        $request = $this->operation['request']['body'];
        $obj = new Payout($request);
        if (Setup::$mode != 'mock') {
            $obj->getSenderBatchHeader()->setSenderBatchId(uniqid());
        }
        self::$batchId = $obj->getSenderBatchHeader()->getSenderBatchId();
        $params = ['sync_mode' => 'true'];
        $result = $obj->create($params, $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertEquals(self::$batchId, $result->getBatchHeader()->getSenderBatchHeader()->getSenderBatchId());
        self::assertEquals('SUCCESS', $result->getBatchHeader()->getBatchStatus());
        $items = $result->getItems();
        self::assertGreaterThan(0, count($items));
        $item = $items[0];
        self::assertEquals('UNCLAIMED', $item->getTransactionStatus());

        return $result;
    }

    /**
     * @depends testCreate
     * @param $payoutBatch PayoutBatch
     * @return PayoutBatch
     */
    public function testGet($payoutBatch)
    {
        $result = Payout::get($payoutBatch->getBatchHeader()->getPayoutBatchId(), $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertNotNull($result->getBatchHeader()->getBatchStatus());
        self::assertEquals(self::$batchId, $result->getBatchHeader()->getSenderBatchHeader()->getSenderBatchId());

        return $result;
    }

    /**
     * @depends testCreate
     * @param $payoutBatch PayoutBatch
     * @return PayoutBatch
     */
    public function testGetItem($payoutBatch)
    {
        $items = $payoutBatch->getItems();
        $item = $items[0];
        $result = PayoutItem::get($item->getPayoutItemId(), $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertEquals($item->getPayoutItemId(), $result->getPayoutItemId());
        self::assertEquals($item->getPayoutBatchId(), $result->getPayoutBatchId());
        self::assertEquals($item->getTransactionId(), $result->getTransactionId());
        self::assertEquals($item->getPayoutItemFee(), $result->getPayoutItemFee());
    }

    /**
     * @depends testCreate
     * @param $payoutBatch PayoutBatch
     * @return PayoutBatch
     */
    public function testCancel($payoutBatch)
    {
        $items = $payoutBatch->getItems();
        $item = $items[0];
        if ($item->getTransactionStatus() != 'UNCLAIMED') {
            self::markTestSkipped('Transaction status needs to be Unclaimed for this test ');

            return;
        }
        $result = PayoutItem::cancel($item->getPayoutItemId(), $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertEquals($item->getPayoutItemId(), $result->getPayoutItemId());
        self::assertEquals($item->getPayoutBatchId(), $result->getPayoutBatchId());
        self::assertEquals($item->getTransactionId(), $result->getTransactionId());
        self::assertEquals($item->getPayoutItemFee(), $result->getPayoutItemFee());
        self::assertEquals('RETURNED', $result->getTransactionStatus());
    }
}
