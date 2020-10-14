<?php

namespace PayPal\Test\Validation;

use PayPal\Validation\ArgumentValidator;
use PHPUnit\Framework\TestCase;

class ArgumentValidatorTest extends TestCase
{
    public static function positiveProvider()
    {
        return [
            ['1'],
            ['something here'],
            [1],
            [[1, 2, 3]],
            [0.123],
            [true],
            [false],
            [[]],
        ];
    }

    public static function invalidProvider()
    {
        return [
            [null],
            [''],
            ['     '],
        ];
    }

    /**
     * @dataProvider positiveProvider
     */
    public function testValidate($input)
    {
        self::assertTrue(ArgumentValidator::validate($input, 'Name'));
    }

    /**
     * @dataProvider invalidProvider
     */
    public function testInvalidDataValidate($input)
    {
        $this->expectException(\InvalidArgumentException::class);
        self::assertTrue(ArgumentValidator::validate($input, 'Name'));
    }
}
