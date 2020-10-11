<?php
namespace PayPal\Test\Validation;

use PayPal\Validation\JsonValidator;
use PHPUnit\Framework\TestCase;

class JsonValidatorTest extends TestCase
{

    public static function positiveProvider(): array
    {
        return array(
            array(null),
            array(''),
            array("{}"),
            array('{"json":"value", "bool":false, "int":1, "float": 0.123, "array": [{"json":"value", "bool":false, "int":1, "float": 0.123},{"json":"value", "bool":false, "int":1, "float": 0.123} ]}')
        );
    }

    public static function invalidProvider(): array
    {
        return array(
            array('{'),
            array('}'),
            array('     '),
            array(array('1' => '23')),
            array('{"json":"value, "bool":false, "int":1, "float": 0.123, "array": [{"json":"value, "bool":false, "int":1, "float": 0.123}"json":"value, "bool":false, "int":1, "float": 0.123} ]}')
        );
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($input): void
    {
        self::assertTrue(JsonValidator::validate($input));
    }

    /**
     *
     * @dataProvider invalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidJson($input): void
    {
        JsonValidator::validate($input);
    }

    /**
     *
     * @dataProvider invalidProvider
     */
    public function testInvalidJsonSilent($input): void
    {
        self::assertFalse(JsonValidator::validate($input, true));
    }
}
