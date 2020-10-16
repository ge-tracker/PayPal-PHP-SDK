<?php

namespace JamesAusten\Dev\Generators;

use Illuminate\Support\Str;
use JamesAusten\Dev\ApiStub;
use JamesAusten\Dev\Contracts\ApiClassGenerator as ApiClassGeneratorContract;

class ApiClassGenerator implements ApiClassGeneratorContract
{
    protected string $stub;
    protected string $content = '';
    protected ApiStub $apiStub;

    protected ApiMethodGenerator $apiMethodGenerator;

    public function __construct(string $stubPath, ApiMethodGenerator $apiMethodGenerator)
    {
        $this->stub = file_get_contents($stubPath . '/api.stub');
        $this->apiMethodGenerator = $apiMethodGenerator;
    }

    public function generate(ApiStub $apiStub): string
    {
        $this->apiStub = $apiStub;

        $this->content = str_replace([
            '{{CLASS_NAME}}',
            '{{DESCRIPTION}}',
            '{{PROPERTY_LIST}}',
            '{{METHODS}}',
            '{{IMPORTS}}',
        ], [
            $apiStub->className,
            Str::ucfirst($apiStub->description),
            $this->propertyList($apiStub->fields),
            $this->methods($apiStub),
            $this->imports($apiStub->fields),
        ], $this->stub);

        return $this->content;
    }

    /**
     * Generate property list
     *
     * @param array $fields
     *
     * @return string
     */
    protected function propertyList(array $fields): string
    {
        $content = '';

        foreach ($fields as $field => $type) {
            $stub = str_replace([
                '{{FUNC_TYPE}}',
                '{{FUNC_FIELD}}',
            ], [
                $this->apiMethodGenerator->formatType($type, true),
                $field,
            ], ' * @property {{FUNC_TYPE}} {{FUNC_FIELD}}');

            $content .= $stub . "\n";
        }

        return $content . ' *';
    }

    /**
     * Generate methods
     *
     * @param \JamesAusten\Dev\ApiStub $apiStub
     *
     * @return string
     */
    protected function methods(ApiStub $apiStub): string
    {
        $content = $this->apiMethodGenerator->generate($apiStub->fields);

        return rtrim($content);
    }

    /**
     * Generate any required imports
     *
     * @param array $fields
     *
     * @return string
     */
    protected function imports(array $fields): string
    {
        $content = '';
        $classImports = [];

        foreach ($fields as $field => $type) {
            // Skip all primitive types
            if (($pos = strpos($type, '\\')) === false) {
                continue;
            }

            // Strip leading backslash
            if ($pos === 0) {
                $type = substr($type, 1);
            }

            // Remove array definitions
            $type = str_replace('[]', '', $type);

            // Once the type has been sanitized, check that it has not already been imported
            if (in_array($type, $classImports, true)) {
                continue;
            }

            $classImports[] = $type;
            $content .= sprintf("use %s;\n", $type);
        }

        return rtrim($content);
    }

    public function getStub()
    {
        return $this->stub;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
