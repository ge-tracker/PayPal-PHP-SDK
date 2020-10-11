<?php
namespace PayPal\Test\Common;

use PayPal\Common\ArrayUtil;
use PHPUnit\Framework\TestCase;

class ArrayUtilTest extends TestCase
{

    public function testIsAssocArray(): void
    {
        $arr = array(1, 2, 3);
        self::assertEquals(false, ArrayUtil::isAssocArray($arr));

        $arr = array(
            'name' => 'John Doe',
            'City' => 'San Jose'
        );
        self::assertEquals(true, ArrayUtil::isAssocArray($arr));

        $arr[] = 'CA';
        self::assertEquals(false, ArrayUtil::isAssocArray($arr));
    }
}
