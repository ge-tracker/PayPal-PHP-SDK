<?php

namespace JamesAusten\Dev\Generators;

use Illuminate\Support\Str;
use JamesAusten\Dev\ApiStub;

class ApiTestClassGenerator extends ApiClassGenerator
{
    public function __construct(string $stubPath, ApiMethodGenerator $apiMethodGenerator)
    {
        parent::__construct($stubPath, $apiMethodGenerator);

        $this->stub = file_get_contents($stubPath . '/api-test.stub');
    }

    /**
     * Generate the main class
     *
     * @param \JamesAusten\Dev\ApiStub $apiStub
     *
     * @return string
     */
    public function generate(ApiStub $apiStub): string
    {
        $this->apiStub = $apiStub;

        $this->content = str_replace([
            '{{CLASS_NAME}}',
            '{{IMPORTS}}',
            '{{DESERIALISATION_STUBS}}',
            '{{GETTER_STUBS}}',
            '{{JSON_STUB}}',
        ], [
            $apiStub->className,
            $this->imports($apiStub->fields),
            $this->deserialisation(),
            $this->getters(),
            $this->json(),
        ], $this->stub);

        return $this->content;
    }

    /**
     * Output generic deserialisation stubs to ensure all fields are populated
     *
     * @return string
     */
    protected function deserialisation(): string
    {
        $content = '';

        foreach ($this->apiStub->fields as $field => $type) {
            $content .= sprintf("        self::assertNotNull(\$obj->get%s());\n", Str::studly($field));
        }

        return rtrim($content);
    }

    /**
     * Output generic getter stubs to ensure all fields are populated
     *
     * @return string
     */
    protected function getters(): string
    {
        $content = '';

        foreach ($this->apiStub->fields as $field => $type) {
            $content .= $this->getterStub($field, $type);
        }

        return rtrim($content);
    }

    /**
     * Format a getter stub based on field type
     *
     * @param string $field
     * @param string $type
     *
     * @return string
     */
    protected function getterStub(string $field, string $type): string
    {
        if ($type === 'bool' || $type === 'boolean') {
            return sprintf("        self::assertFalse(\$obj->get%s());\n", Str::studly($field));
        }

        if (!$this->apiMethodGenerator->isPrimitive($type)) {
            $testClass = $this->apiMethodGenerator->stripFqcn($this->apiMethodGenerator->swapClassForTest($type));

            return sprintf(
                "        self::assertEquals(\$obj->get%s(), %s::getObject());\n",
                Str::studly($field),
                $testClass
            );
        }

        return sprintf("        self::assertEquals('TestSample', \$obj->get%s());\n", Str::studly($field));
    }

    /**
     * Build a test JSON representation of the object
     *
     * @return string
     */
    protected function json(): string
    {
        $content = '{';

        foreach ($this->apiStub->fields as $field => $type) {
            $content .= $this->jsonStub($field, $type);
        }

        if ($this->apiStub->links) {
            $content .= '"links":\' . LinksTest::getJson() . \'}';
        } else {
            $content = Str::replaceLast(',', '', $content) . '}';
        }

        return $content;
    }

    /**
     * Format JSON based on field type
     *
     * @param string $field
     * @param string $type
     *
     * @return string
     */
    protected function jsonStub(string $field, string $type): string
    {
        if (!$this->apiMethodGenerator->isPrimitive($type)) {
            $testClass = $this->apiMethodGenerator->stripFqcn($this->apiMethodGenerator->swapClassForTest($type));

            return sprintf('"%s":\' . ' . $testClass . '::getJson() . \',', $field);
        }

        return sprintf('"%s":"TestSample",', $field);
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
        $imports = $this->apiMethodGenerator->swapClassForTest(parent::imports($fields));

        $imports = sprintf("use PayPal\Api\%s;\n%s", $this->apiStub->className, $imports);

        return $imports;
    }
}
