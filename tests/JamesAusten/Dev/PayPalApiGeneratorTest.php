<?php

namespace JamesAusten\Dev;

use PHPUnit\Framework\TestCase;

class PayPalApiGeneratorTest extends TestCase
{
    private PayPalApiGenerator $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->generator = new \JamesAusten\Dev\PayPalApiGenerator(__DIR__, [
            'apiTarget'  => __DIR__ . '/Stubs',
            'testTarget' => __DIR__ . '/Stubs',
            'stubPath'   => __DIR__ . '/../../Stubs/Generator',
        ]);

        $this->cleanUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->cleanUp();
    }

    /** @test */
    public function will_copy_api_definition_if_not_exists(): void
    {
        $this->expectExceptionMessage('Please edit the contents of');
        $this->expectException(\RuntimeException::class);

        $this->generator->makeClass();
    }

    /** @test */
    public function can_generate_api_file(): void
    {
        $expectedClass = file_get_contents(__DIR__ . '/../../Stubs/ApiExpected.stub');
        $output = $this->generator->createStubFile()->makeClass();

        self::assertFileExists(__DIR__ . '/Stubs/CycleExecutions.php');

        self::assertSame($expectedClass, $output);
    }

    /** @test */
    public function can_generate_test_file(): void
    {
        $expectedTest = file_get_contents(__DIR__ . '/../../Stubs/ApiTestExpected.stub');
        $output = $this->generator->createStubFile()->makeTest();

        self::assertFileExists(__DIR__ . '/Stubs/CycleExecutionsTest.php');

        self::assertSame($expectedTest, $output);
    }

    private function cleanUp(): void
    {
        @unlink(__DIR__ . '/api.stub.php');
        @unlink(__DIR__ . '/Stubs/CycleExecutions.php');
        @unlink(__DIR__ . '/Stubs/CycleExecutionsTest.php');
    }
}
