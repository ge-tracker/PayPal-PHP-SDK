<?php

namespace PayPal\Test\Functional\Api;

use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Api\Plan;
use PayPal\Test\Functional\Setup;
use PHPUnit\Framework\TestCase;

/**
 * Class Billing Plans
 *
 * @package PayPal\Test\Api
 */
class BillingPlansFunctionalTest extends TestCase
{

    public static $obj;

    public $operation;

    public $response;

    public $mode = 'mock';

    public $mockPayPalRestCall;

    public $apiContext;

    protected function setUp(): void
    {
        $className = $this->getClassName();
        $testName = $this->getName();
        $this->setupTest($className, $testName);
    }

    public function setupTest($className, $testName): void
    {
        $operationString = file_get_contents(__DIR__ . "/../resources/$className/$testName.json");
        $this->operation = json_decode($operationString, true);
        $this->response = true;
        if (array_key_exists('body', $this->operation['response'])) {
            $this->response = json_encode($this->operation['response']['body']);
        }

        Setup::SetUpForFunctionalTests($this);
    }

    /**
     * Helper function to get a Plan object in Active State
     *
     * @return Plan
     */
    public static function getPlan(): Plan
    {
        if (!self::$obj) {
            $test = new self();
            // Creates a Plan
            $test->setupTest($test->getClassName(), 'testCreate');
            self::$obj = $test->testCreate();
            // Updates the Status to Active
            $test->setupTest($test->getClassName(), 'testUpdateChangingState');
            self::$obj = $test->testUpdateChangingState(self::$obj);
        }
        return self::$obj;
    }

    /**
     * Returns just the classname of the test you are executing. It removes the namespaces.
     * @return string
     */
    public function getClassName(): string
    {
        return join('', array_slice(explode('\\', get_class($this)), -1));
    }

    public function testCreate(): Plan
    {
        $request = $this->operation['request']['body'];
        $obj = new Plan($request);
        $result = $obj->create($this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::$obj = $result;
        return $result;
    }

    public function testCreateWithNOChargeModel(): Plan
    {
        $request = $this->operation['request']['body'];
        $obj = new Plan($request);
        $result = $obj->create($this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        return $result;
    }

    /**
     * @depends testCreate
     * @param $plan Plan
     * @return Plan
     */
    public function testGet($plan): Plan
    {
        $result = Plan::get($plan->getId(), $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertEquals($plan->getId(), $result->getId());
        self::assertEqualsCanonicalizing($plan, $result, "");
        return $result;
    }

    /**
     * @depends testGet
     * @param $plan Plan
     */
    public function testGetList($plan): void
    {
        $result = Plan::all(array('page_size' => '20', 'total_required' => 'yes'), $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        $totalPages = $result->getTotalPages();
        $found = false;
        $foundObject = null;
        do {
            foreach ($result->getPlans() as $obj) {
                if ($obj->getId() == $plan->getId()) {
                    $found = true;
                    $foundObject = $obj;
                    break;
                }
            }
            if (!$found) {
                $result = Plan::all(array('page' => --$totalPages, 'page_size' => '20', 'total_required' => 'yes'), $this->apiContext, $this->mockPayPalRestCall);
            }
        } while ($totalPages > 0 && $found == false);
        self::assertTrue($found, "The Created Plan was not found in the get list");
        self::assertEquals($plan->getId(), $foundObject->getId());
    }

    /**
     * @depends testGet
     * @param $plan Plan
     */
    public function testUpdateChangingMerchantPreferences($plan): void
    {
        /** @var Patch[] $request */
        $request = $this->operation['request']['body'][0];
        $patch = new Patch();
        $patch->setOp($request['op']);
        $patch->setPath($request['path']);
        $patch->setValue($request['value']);
        $patches = array();
        $patches[] = $patch;
        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);
        $result = $plan->update($patchRequest, $this->apiContext, $this->mockPayPalRestCall);
        self::assertTrue($result);
    }

    /**
     * @depends testGet
     * @param $plan Plan
     */
    public function testUpdateChangingPD($plan): void
    {
        /** @var Patch[] $request */
        $request = $this->operation['request']['body'][0];
        $patch = new Patch();
        $patch->setOp($request['op']);
        $paymentDefinitions = $plan->getPaymentDefinitions();
        $patch->setPath('/payment-definitions/' . $paymentDefinitions[0]->getId());
        $patch->setValue($request['value']);
        $patches = array();
        $patches[] = $patch;
        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);
        $result = $plan->update($patchRequest, $this->apiContext, $this->mockPayPalRestCall);
        self::assertTrue($result);
    }

    /**
     * @depends testGet
     * @param $plan Plan
     * @return Plan
     */
    public function testUpdateChangingState($plan): Plan
    {
        /** @var Patch[] $request */
        $request = $this->operation['request']['body'][0];
        $patch = new Patch();
        $patch->setOp($request['op']);
        $patch->setPath($request['path']);
        $patch->setValue($request['value']);
        $patches = array();
        $patches[] = $patch;
        $patchRequest = new PatchRequest();
        $patchRequest->setPatches($patches);
        $result = $plan->update($patchRequest, $this->apiContext, $this->mockPayPalRestCall);
        self::assertTrue($result);
        return Plan::get($plan->getId(), $this->apiContext, $this->mockPayPalRestCall);
    }
}
