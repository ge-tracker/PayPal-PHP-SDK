<?php

namespace PayPal\Test\Common;

use PayPal\Api\Amount;
use PayPal\Api\Currency;
use PayPal\Api\Details;
use PayPal\Api\InvoiceItem;
use PayPal\Api\Item;
use PayPal\Api\Tax;
use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Test\Validation\NumericValidatorTest;
use PHPUnit\Framework\TestCase;

class FormatConverterTest extends TestCase
{
    public static function classMethodListProvider()
    {
        return [
            [new Item(), 'Price'],
            [new Item(), 'Tax'],
            [new Amount(), 'Total'],
            [new Currency(), 'Value'],
            [new Details(), 'Shipping'],
            [new Details(), 'SubTotal'],
            [new Details(), 'Tax'],
            [new Details(), 'Fee'],
            [new Details(), 'ShippingDiscount'],
            [new Details(), 'Insurance'],
            [new Details(), 'HandlingFee'],
            [new Details(), 'GiftWrap'],
            [new InvoiceItem(), 'Quantity'],
            [new Tax(), 'Percent'],
        ];
    }

    public static function CurrencyListWithNoDecimalsProvider()
    {
        return [
            ['JPY'],
            ['TWD'],
            ['HUF'],
        ];
    }

    public static function apiModelSettersProvider()
    {
        $provider = [];
        foreach (NumericValidatorTest::positiveProvider() as $value) {
            foreach (self::classMethodListProvider() as $method) {
                $provider[] = array_merge($method, [$value]);
            }
        }

        return $provider;
    }

    public static function apiModelSettersInvalidProvider()
    {
        $provider = [];
        foreach (NumericValidatorTest::invalidProvider() as $value) {
            foreach (self::classMethodListProvider() as $method) {
                $provider[] = array_merge($method, [$value]);
            }
        }

        return $provider;
    }

    /**
     * @dataProvider \PayPal\Test\Validation\NumericValidatorTest::positiveProvider
     */
    public function testFormatToTwoDecimalPlaces($input, $expected)
    {
        $result = FormatConverter::formatToNumber($input);
        self::assertEquals($expected, $result);
    }

    /**
     * @dataProvider CurrencyListWithNoDecimalsProvider
     */
    public function testPriceWithNoDecimalCurrencyInvalid($input)
    {
        try {
            FormatConverter::formatToPrice('1.234', $input);
        } catch (\InvalidArgumentException $ex) {
            self::assertStringContainsString('value cannot have decimals for', $ex->getMessage());
        }
    }

    /**
     * @dataProvider CurrencyListWithNoDecimalsProvider
     */
    public function testPriceWithNoDecimalCurrencyValid($input)
    {
        $result = FormatConverter::formatToPrice('1.0000000', $input);
        self::assertEquals('1', $result);
    }

    /**
     * @dataProvider \PayPal\Test\Validation\NumericValidatorTest::positiveProvider
     */
    public function testFormatToNumber($input, $expected)
    {
        $result = FormatConverter::formatToNumber($input);
        self::assertEquals($expected, $result);
    }

    public function testFormatToNumberDecimals()
    {
        $result = FormatConverter::formatToNumber('0.0', 4);
        self::assertEquals('0.0000', $result);
    }

    public function testFormat()
    {
        $result = FormatConverter::format('12.0123', '%0.2f');
        self::assertEquals('12.01', $result);
    }

    /**
     * @dataProvider apiModelSettersProvider
     *
     * @param PayPalModel $class Class Object
     * @param string $method Method Name where the format is being applied
     * @param array $values array of ['input', 'expectedResponse'] is provided
     */
    public function testSettersOfKnownApiModel($class, $method, $values)
    {
        $obj = new $class();
        $setter = 'set' . $method;
        $getter = 'get' . $method;
        $result = $obj->$setter($values[0]);
        self::assertEquals($values[1], $result->$getter());
    }

    /**
     * @dataProvider apiModelSettersInvalidProvider
     */
    public function testSettersOfKnownApiModelInvalid($class, $methodName, $values)
    {
        $this->expectException(\InvalidArgumentException::class);
        $obj = new $class();
        $setter = 'set' . $methodName;
        $obj->$setter($values[0]);
    }
}
