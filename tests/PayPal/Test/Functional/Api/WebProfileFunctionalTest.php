<?php

namespace PayPal\Test\Functional\Api;

use PayPal\Api\CreateProfileResponse;
use PayPal\Api\Patch;
use PayPal\Api\WebProfile;
use PayPal\Test\Functional\Setup;
use PHPUnit\Framework\TestCase;

/**
 * Class WebProfile
 */
class WebProfileFunctionalTest extends TestCase
{
    public $operation;

    public $response;

    public $mockPayPalRestCall;

    public $apiContext;

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
        $obj = new WebProfile($request);
        $obj->setName(uniqid());
        $result = $obj->create($this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);

        return $result;
    }

    /**
     * @depends testCreate
     * @param $createProfileResponse CreateProfileResponse
     * @return WebProfile
     */
    public function testGet($createProfileResponse)
    {
        $result = WebProfile::get($createProfileResponse->getId(), $this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertEquals($createProfileResponse->getId(), $result->getId());
        self::assertEquals($this->operation['response']['body']['presentation']['logo_image'], $result->getPresentation()->getLogoImage());
        self::assertEquals($this->operation['response']['body']['input_fields']['no_shipping'], $result->getInputFields()->getNoShipping());
        self::assertEquals($this->operation['response']['body']['input_fields']['address_override'], $result->getInputFields()->getAddressOverride());

        return $result;
    }

    /**
     * @depends testGet
     * @param $webProfile WebProfile
     */
    public function testGetList($webProfile)
    {
        $result = WebProfile::get_list($this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        $found = false;
        $foundObject = null;
        foreach ($result as $webProfileObject) {
            if ($webProfileObject->getId() == $webProfile->getId()) {
                $found = true;
                $foundObject = $webProfileObject;

                break;
            }
        }
        self::assertTrue($found, 'The Created Web Profile was not found in the get list');
        self::assertEquals($webProfile->getId(), $foundObject->getId());
        self::assertEquals($this->operation['response']['body'][0]['presentation']['logo_image'], $foundObject->getPresentation()->getLogoImage());
        self::assertEquals($this->operation['response']['body'][0]['input_fields']['no_shipping'], $foundObject->getInputFields()->getNoShipping());
        self::assertEquals($this->operation['response']['body'][0]['input_fields']['address_override'], $foundObject->getInputFields()->getAddressOverride());
    }

    /**
     * @depends testGet
     * @param $webProfile WebProfile
     */
    public function testUpdate($webProfile)
    {
        $boolValue = $webProfile->getInputFields()->getNoShipping();
        $newValue = ($boolValue + 1) % 2;
        $webProfile->getInputFields()->setNoShipping($newValue);
        $result = $webProfile->update($this->apiContext, $this->mockPayPalRestCall);
        self::assertNotNull($result);
        self::assertEquals($webProfile->getInputFields()->getNoShipping(), $newValue);
    }

    /**
     * @depends testGet
     * @param $webProfile WebProfile
     */
    public function testPartialUpdate($webProfile)
    {
        $patches = [];
        $patches[] = new Patch('{
             "op": "add",
             "path": "/presentation/brand_name",
             "value":"new_brand_name"
          }');
        $patches[] = new Patch('{
             "op": "remove",
            "path": "/flow_config/landing_page_type"

          }');
        $result = $webProfile->partial_update($patches, $this->apiContext, $this->mockPayPalRestCall);
        self::assertTrue($result);
    }

    /**
     * @depends testGet
     * @param $createProfileResponse CreateProfileResponse
     */
    public function testDelete($createProfileResponse)
    {
        $webProfile = new WebProfile();
        $webProfile->setId($createProfileResponse->getId());
        $result = $webProfile->delete($this->apiContext, $this->mockPayPalRestCall);
        self::assertTrue($result);
    }
}
