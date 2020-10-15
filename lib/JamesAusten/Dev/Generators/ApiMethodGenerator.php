<?php

namespace JamesAusten\Dev\Generators;

use Illuminate\Support\Str;

class ApiMethodGenerator
{
    private string $stub;
    private string $content = '';

    public function __construct(string $stubPath)
    {
        $this->stub = file_get_contents($stubPath . '/api-method.stub');
    }

    /**
     * Generate API getters/setters from stubbed fields
     *
     * @param array $fields
     *
     * @return string
     */
    public function generate(array $fields): string
    {
        foreach ($fields as $field => $type) {
            $stub = $this->stub;
            $stub = str_replace([
                '{{FUNC_TYPE}}',
                '{{FUNC_PARAM}}',
                '{{FUNC_FIELD}}',
                '{{FUNC_NAME}}',
            ], [
                $this->formatType($type, true),
                $field,
                $field,
                Str::studly($field),
            ], $stub);

            $this->content .= $stub . "\n";
        }

        return $this->content;
    }

    /**
     * @param string $type         Field type
     * @param bool   $leadingSlash Should leading slash be included?
     *
     * @return string
     */
    public function formatType(string $type, bool $leadingSlash = false): string
    {
        // Primitive types should return verbatim
        if (($pos = strpos($type, '\\')) === false) {
            return $type;
        }

        // Type begins with a leading slash
        if ($pos === 0) {
            return $leadingSlash ? $type : substr($type, 1);
        }

        return $leadingSlash ? '\\' . $type : $type;
    }

    /**
     * Determine if the type is primitive (array, bool, etc.)
     *
     * @param string $type
     *
     * @return bool
     */
    public function isPrimitive(string $type): bool
    {
        return strpos($type, '\\') === false;
    }

    /**
     * Strip fully-qualified class from class, leaving only the base
     *
     * @param string $fqcn
     *
     * @return string
     */
    public function stripFqcn(string $fqcn): string
    {
        return str_replace(['\PayPal\\', 'PayPal\Test\Api\\', 'PayPal\Api\\'], ['PayPal\\', '', ''], $fqcn);
    }

    /**
     * Swap a fully-qualified PayPal API class name for a Test class name
     *
     * @param string $fqcn
     * @param bool   $leadingSlash
     *
     * @return string
     */
    public function swapClassForTest(string $fqcn, bool $leadingSlash = false): string
    {
        $className = str_replace([
            'PayPal\Api\\',
            ';',
            '[]',
        ], [
            'PayPal\Test\Api\\',
            'Test;',
            '',
        ], $fqcn);

        // Ensure `Test` is appended
        if ($className !== '' && !Str::endsWith($className, ';')) {
            $className .= 'Test';
        }

        if ($leadingSlash) {
            return '\\' . rtrim($className);
        }

        return rtrim($className);
    }

    /**
     * @return false|string
     */
    public function getStub()
    {
        return $this->stub;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
