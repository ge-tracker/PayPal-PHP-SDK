<?php

use PayPal\Common\PayPalModel;
use PHPUnit\Framework\TestCase;

class SimpleModelTestClass extends PayPalModel
{
    /**
     * @param string $field1
     * @return self
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;

        return $this;
    }

    /**
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * @param string $field2
     * @return self
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;

        return $this;
    }

    /**
     * @return string
     */
    public function getField2()
    {
        return $this->field2;
    }
}

class ContainerModelTestClass extends PayPalModel
{
    /**
     * @param string $field1
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;

        return $this;
    }

    /**
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * @param SimpleModelTestClass $field1
     */
    public function setNested1($nested1)
    {
        $this->nested1 = $nested1;

        return $this;
    }

    /**
     * @return SimpleModelTestClass
     */
    public function getNested1()
    {
        return $this->nested1;
    }
}

class ListModelTestClass extends PayPalModel
{
    /**
     * @param string $list1
     */
    public function setList1($list1)
    {
        $this->list1 = $list1;
    }

    /**
     * @return string
     */
    public function getList1()
    {
        return $this->list1;
    }

    /**
     * @param SimpleModelTestClass $list2 array of SimpleModelTestClass
     */
    public function setList2($list2)
    {
        $this->list2 = $list2;

        return $this;
    }

    /**
     * @return SimpleModelTestClass array of SimpleModelTestClass
     */
    public function getList2()
    {
        return $this->list2;
    }
}

/**
 * Test class for PayPalModel.
 */
class PayPalModelTest extends TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function teatDown(): void
    {
    }

    public function testSimpleConversion()
    {
        $o = new SimpleModelTestClass();
        $o->setField1('value 1');
        $o->setField2('value 2');

        self::assertEquals('{"field1":"value 1","field2":"value 2"}', $o->toJSON());

        $oCopy = new SimpleModelTestClass();
        $oCopy->fromJson($o->toJSON());
        self::assertEquals($o, $oCopy);
    }

    public function testEmptyObject()
    {
        $child = new SimpleModelTestClass();
        $child->setField1(null);

        $parent = new ContainerModelTestClass();
        $parent->setField1('parent');
        $parent->setNested1($child);

        self::assertEquals(
            '{"field1":"parent","nested1":{}}',
            $parent->toJSON()
        );

        $parentCopy = new ContainerModelTestClass();
        $parentCopy->fromJson($parent->toJSON());
        self::assertEquals($parent, $parentCopy);
    }

    public function testSpecialChars()
    {
        $o = new SimpleModelTestClass();
        $o->setField1('value "1');
        $o->setField2('value 2');

        self::assertEquals('{"field1":"value \"1","field2":"value 2"}', $o->toJSON());

        $oCopy = new SimpleModelTestClass();
        $oCopy->fromJson($o->toJSON());
        self::assertEquals($o, $oCopy);
    }

    public function testNestedConversion()
    {
        $child = new SimpleModelTestClass();
        $child->setField1('value 1');
        $child->setField2('value 2');

        $parent = new ContainerModelTestClass();
        $parent->setField1('parent');
        $parent->setNested1($child);

        self::assertEquals(
            '{"field1":"parent","nested1":{"field1":"value 1","field2":"value 2"}}',
            $parent->toJSON()
        );

        $parentCopy = new ContainerModelTestClass();
        $parentCopy->fromJson($parent->toJSON());
        self::assertEquals($parent, $parentCopy);
    }

    public function testListConversion()
    {
        $c1 = new SimpleModelTestClass();
        $c1->setField1('a')->setField2('value');

        $c2 = new SimpleModelTestClass();
        $c1->setField1('another')->setField2('object');

        $parent = new ListModelTestClass();
        $parent->setList1(['simple', 'list', 'with', 'integer', 'keys']);
        $parent->setList2([$c1, $c2]);

        $parentCopy = new ListModelTestClass();
        $parentCopy->fromJson($parent->toJSON());
        self::assertEquals($parent, $parentCopy);
    }

    public function EmptyNullProvider()
    {
        return [
            [0, true],
            [null, false],
            ['', true],
            ['null', true],
            [-1, true],
            ['', true],
        ];
    }

    /**
     * @dataProvider EmptyNullProvider
     * @param string|null $field2
     * @param bool $matches
     */
    public function testEmptyNullConversion($field2, $matches)
    {
        $c1 = new SimpleModelTestClass();
        $c1->setField1('a')->setField2($field2);
        self::assertNotSame(strpos($c1->toJSON(), 'field2'), !$matches);
    }

    public function getProvider()
    {
        return [
            ['[[]]', 1, [[]]],
            ['[{}]', 1, [new PayPalModel()]],
            ['[{"id":"123"}]', 1, [new PayPalModel(['id' => '123'])]],
            ['{"id":"123"}', 1, [new PayPalModel(['id' => '123'])]],
            ['[]', 0, []],
            ['{}', 1, [new PayPalModel()]],
            [[], 0, []],
            [['id' => '123'], 1, [new PayPalModel(['id' =>'123'])]],
            [null, 0, null],
            ['', 0, []],
            ['[[], {"id":"123"}]', 2, [[], new PayPalModel(['id'=> '123'])]],
            ['[{"id":"123"}, {"id":"321"}]', 2,
                [
                    new PayPalModel(['id' => '123']),
                    new PayPalModel(['id' => '321']),
                ],
            ],
            [[['id' => '123'], ['id' => '321']], 2,
                [
                    new PayPalModel(['id' => '123']),
                    new PayPalModel(['id' => '321']),
                ], ],
            [new PayPalModel('{"id": "123"}'), 1, [new PayPalModel(['id' => '123'])]],
        ];
    }

    public function getInvalidProvider()
    {
        return [
            ['{]'],
            ['[{]'],
        ];
    }

    /**
     * @dataProvider getProvider
     * @param string|null $input
     * @param int $count
     * @param mixed $expected
     */
    public function testGetList($input, $count, $expected)
    {
        $result = PayPalModel::getList($input);
        self::assertEquals($expected, $result);
        if ($input) {
            self::assertNotNull($result);
            self::assertIsArray($result);
            self::assertCount($count, $result);
        }
    }

    /**
     * @dataProvider getInvalidProvider
     *
     *
     *
     * @param string|null $input
     */
    public function testGetListInvalidInput($input)
    {
        $this->expectExceptionMessage('Invalid JSON String');
        $this->expectException(InvalidArgumentException::class);
        $result = PayPalModel::getList($input);
    }
}
