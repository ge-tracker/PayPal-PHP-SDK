<?php

namespace PayPal\Test\Functional;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Core\PayPalCredentialManager;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PHPUnit\Framework\TestCase;

class Setup
{
    public static $mode = 'mock';

    public static function SetUpForFunctionalTests(TestCase $test)
    {
        $configs = [
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'log',
        ];
        $test->apiContext = new ApiContext(
            new OAuthTokenCredential('AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS', 'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL')
        );
        $test->apiContext->setConfig($configs);

        //PayPalConfigManager::getInstance()->addConfigFromIni(__DIR__. '/../../../sdk_config.ini');
        //PayPalConfigManager::getInstance()->addConfigs($configs);
        PayPalCredentialManager::getInstance()->setCredentialObject(PayPalCredentialManager::getInstance()->getCredentialObject('acct1'));

        self::$mode = getenv('REST_MODE') ?: 'mock';
        if (self::$mode != 'sandbox') {

            // Mock PayPalRest Caller if mode set to mock
            $test->mockPayPalRestCall = $test->getMockBuilder(PayPalRestCall::class)
                ->disableOriginalConstructor()
                ->getMock();

            $test->mockPayPalRestCall->expects($test->any())
                ->method('execute')
                ->willReturn($test->response);
        }
    }
}
