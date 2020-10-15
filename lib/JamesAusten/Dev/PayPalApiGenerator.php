<?php

namespace JamesAusten\Dev;

use JamesAusten\Dev\Contracts\ApiClassGenerator as ApiClassGeneratorContract;
use JamesAusten\Dev\Generators\ApiClassGenerator;
use JamesAusten\Dev\Generators\ApiMethodGenerator;
use JamesAusten\Dev\Generators\ApiTestClassGenerator;
use RuntimeException;

class PayPalApiGenerator
{
    private string $basePath;
    private string $stubPath;
    private string $apiTarget;
    private string $testTarget;
    private bool $verified = false;
    private array $writtenPaths = [];

    private ApiStub $apiStub;

    private ApiClassGeneratorContract $classGenerator;
    private ApiClassGeneratorContract $testGenerator;

    public function __construct(string $basePath, array $options)
    {
        $this->basePath = $basePath;
        $this->apiTarget = $options['apiTarget'];
        $this->testTarget = $options['testTarget'];
        $this->stubPath = $options['stubPath'] ?? $this->basePath . '/tests/Stubs/Generator';
    }

    /**
     * Generate a PayPal API class
     *
     * @return string
     */
    public function make(): string
    {
        $this->verifyExistence();

        $apiContent = $this->makeClass();
        $this->makeTest();

        return $apiContent;
    }

    /**
     * Generate a PayPal API class
     *
     * @return string
     */
    public function makeClass(): string
    {
        $this->verifyExistence();

        $generator = $this->makeGenerator();

        // Generate main and test class
        $generator->generate($this->apiStub);

        $apiContent = $this->classGenerator->getContent();

        // Write the content to the target files
        $this->writeApi($apiContent);

        return $apiContent;
    }

    /**
     * Generate a PayPal API test class
     *
     * @return string
     */
    public function makeTest(): string
    {
        $this->verifyExistence();

        $this->makeGenerator();

        // Generate test class
        $this->testGenerator->generate($this->apiStub);

        $apiContent = $this->testGenerator->getContent();

        // Write the content to the target files
        $this->writeTest($apiContent);

        return $apiContent;
    }

    private function writeFile(string $fileName, string $content): void
    {
        $this->writtenPaths[] = $fileName;
        file_put_contents($fileName, $content);
    }

    protected function writeApi(string $content): void
    {
        $this->writeFile($this->apiTarget . '/' . $this->apiStub->className . '.php', $content);
    }

    protected function writeTest(string $content): void
    {
        $this->writeFile($this->testTarget . '/' . $this->apiStub->className . 'Test.php', $content);
    }

    /**
     * Copy stub file into the working directory
     *
     * @return self
     */
    public function createStubFile(): self
    {
        copy($this->stubPath . '/api-definition.stub', $this->basePath . '/api.stub.php');

        return $this;
    }

    /**
     * Verify the stub file has been created, and load the defined variables
     *
     * @noinspection PhpUndefinedVariableInspection
     * @noinspection PhpIncludeInspection
     */
    protected function verifyExistence(): void
    {
        if ($this->verified) {
            return;
        }

        $stubFile = $this->basePath . '/api.stub.php';

        if (!file_exists($stubFile)) {
            $this->createStubFile();

            throw new RuntimeException('Please edit the contents of ./api.stub.php');
        }

        require $stubFile;

        $this->apiStub = $this->makeStub($class, $description, $fields, $links);
    }

    /**
     * Construct required objects to generate an API
     *
     * @return \JamesAusten\Dev\Contracts\ApiClassGenerator
     */
    protected function makeGenerator(): ApiClassGeneratorContract
    {
        if (isset($this->classGenerator)) {
            return $this->classGenerator;
        }

        $methodGenerator = new ApiMethodGenerator($this->stubPath);

        $this->classGenerator = new ApiClassGenerator($this->stubPath, $methodGenerator);
        $this->testGenerator = new ApiTestClassGenerator($this->stubPath, $methodGenerator);

        return $this->classGenerator;
    }

    /**
     * Create a representation of a stubbed API
     *
     * @param string $className
     * @param string $description
     * @param array  $fields
     * @param bool   $links
     *
     * @return \JamesAusten\Dev\ApiStub
     */
    protected function makeStub(string $className, string $description, array $fields, bool $links): ApiStub
    {
        $stub = new ApiStub();
        $stub->className = $className;
        $stub->description = $description;
        $stub->fields = $fields;
        $stub->links = $links;

        return $stub;
    }

    /**
     * @return array
     */
    public function getWrittenPaths(): array
    {
        return $this->writtenPaths;
    }
}
