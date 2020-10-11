<?php
namespace PayPal\Test\Validation;

use PayPal\Validation\ArgumentValidator;
use PHPUnit\Framework\TestCase;

class ArgumentValidatorTest extends TestCase
{

    public static function positiveProvider(): array
    {
        return array(
            array("1"),
            array("something here"),
            array(1),
            array(array(1,2,3)),
            array(0.123),
            array(true),
            array(false),
            array(array()),
        );
    }

    public static function invalidProvider(): array
    {
        return array(
            array(null),
            array(''),
            array('     ')
        );
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($input): void
    {
        self::assertTrue(ArgumentValidator::validate($input, "Name"));
    }

    /**
     *
     * @dataProvider invalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidDataValidate($input): void
    {
        self::assertTrue(ArgumentValidator::validate($input, "Name"));
    }
}
