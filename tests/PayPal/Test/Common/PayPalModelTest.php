<?php

use PayPal\Common\PayPalModel;
use PHPUnit\Framework\TestCase;

class SimpleModelTestClass extends PayPalModel
{
    /**
     *
     * @access public
     * @param string $field1
     * @return self
     */
    public function setField1($field1): self
    {
        $this->field1 = $field1;
        return $this;
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     *
     * @access public
     * @param string $field2
     * @return self
     */
    public function setField2($field2): self
    {
        $this->field2 = $field2;
        return $this;
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getField2(): string
    {
        return $this->field2;
    }
}


class ContainerModelTestClass extends PayPalModel
{

    /**
     *
     * @access public
     * @param string $field1
     */
    public function setField1($field1): \ContainerModelTestClass
    {
        $this->field1 = $field1;
        return $this;
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getField1(): string
    {
        return $this->field1;
    }

    /**
     *
     * @access public
     * @param SimpleModelTestClass $field1
     */
    public function setNested1($nested1): \ContainerModelTestClass
    {
        $this->nested1 = $nested1;
        return $this;
    }

    /**
     *
     * @access public
     * @return SimpleModelTestClass
     */
    public function getNested1(): \SimpleModelTestClass
    {
        return $this->nested1;
    }
}

class ListModelTestClass extends PayPalModel
{

    /**
     *
     * @access public
     * @param string $list1
     */
    public function setList1($list1): void
    {
        $this->list1 = $list1;
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getList1(): string
    {
        return $this->list1;
    }

    /**
     *
     * @access public
     * @param SimpleModelTestClass $list2 array of SimpleModelTestClass
     */
    public function setList2($list2): \ListModelTestClass
    {
        $this->list2 = $list2;
        return $this;
    }

    /**
     *
     * @access public
     * @return SimpleModelTestClass array of SimpleModelTestClass
     */
    public function getList2(): \SimpleModelTestClass
    {
        return $this->list2;
    }
}

/**
 * Test class for PayPalModel.
 *
 */
class PayPalModelTest extends TestCase
{
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void    {
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void
    {
    }

    /**
     */
    public function testSimpleConversion(): void
    {
        $o = new SimpleModelTestClass();
        $o->setField1('value 1');
        $o->setField2("value 2");

        self::assertEquals('{"field1":"value 1","field2":"value 2"}', $o->toJSON());

        $oCopy = new SimpleModelTestClass();
        $oCopy->fromJson($o->toJSON());
        self::assertEquals($o, $oCopy);
    }

    /**
     */
    public function testEmptyObject(): void
    {
        $child = new SimpleModelTestClass();
        $child->setField1(null);

        $parent = new ContainerModelTestClass();
        $parent->setField1("parent");
        $parent->setNested1($child);

        self::assertEquals('{"field1":"parent","nested1":{}}',
            $parent->toJSON());

        $parentCopy = new ContainerModelTestClass();
        $parentCopy->fromJson($parent->toJSON());
        self::assertEquals($parent, $parentCopy);
    }

    /**
     */
    public function testSpecialChars(): void
    {
        $o = new SimpleModelTestClass();
        $o->setField1('value "1');
        $o->setField2("value 2");

        self::assertEquals('{"field1":"value \"1","field2":"value 2"}', $o->toJSON());

        $oCopy = new SimpleModelTestClass();
        $oCopy->fromJson($o->toJSON());
        self::assertEquals($o, $oCopy);
    }


    /**
     */
    public function testNestedConversion(): void
    {
        $child = new SimpleModelTestClass();
        $child->setField1('value 1');
        $child->setField2("value 2");

        $parent = new ContainerModelTestClass();
        $parent->setField1("parent");
        $parent->setNested1($child);

        self::assertEquals('{"field1":"parent","nested1":{"field1":"value 1","field2":"value 2"}}',
            $parent->toJSON());

        $parentCopy = new ContainerModelTestClass();
        $parentCopy->fromJson($parent->toJSON());
        self::assertEquals($parent, $parentCopy);
    }


    /**
     */
    public function testListConversion(): void
    {
        $c1 = new SimpleModelTestClass();
        $c1->setField1("a")->setField2('value');

        $c2 = new SimpleModelTestClass();
        $c1->setField1("another")->setField2('object');

        $parent = new ListModelTestClass();
        $parent->setList1(array('simple', 'list', 'with', 'integer', 'keys'));
        $parent->setList2(array($c1, $c2));

        $parentCopy = new ListModelTestClass();
        $parentCopy->fromJson($parent->toJSON());
        self::assertEquals($parent, $parentCopy);
    }

    public function EmptyNullProvider(): array
    {
        return array(
            array(0, true),
            array(null, false),
            array("", true),
            array("null", true),
            array(-1, true),
            array('', true)
        );
    }

    /**
     * @dataProvider EmptyNullProvider
     * @param string|null $field2
     * @param bool $matches
     */
    public function testEmptyNullConversion($field2, $matches): void
    {
        $c1 = new SimpleModelTestClass();
        $c1->setField1("a")->setField2($field2);
        self::assertNotSame(strpos($c1->toJSON(), "field2"), !$matches);
    }

    public function getProvider(): array
    {
        return array(
            array('[[]]', 1, array(array())),
            array('[{}]', 1, array(new PayPalModel())),
            array('[{"id":"123"}]', 1, array(new PayPalModel(array('id' => '123')))),
            array('{"id":"123"}', 1, array(new PayPalModel(array('id' => '123')))),
            array('[]', 0, array()),
            array('{}', 1, array(new PayPalModel())),
            array(array(), 0, array()),
            array(array("id" => "123"), 1, array(new PayPalModel(array('id' =>'123')))),
            array(null, 0, null),
            array('',0, array()),
            array('[[], {"id":"123"}]', 2, array(array(), new PayPalModel(array("id"=> "123")))),
            array('[{"id":"123"}, {"id":"321"}]', 2,
                    array(
                        new PayPalModel(array("id" => "123")),
                        new PayPalModel(array("id" => "321"))
                    )
            ),
            array(array(array("id" => "123"), array("id" => "321")), 2,
                array(
                    new PayPalModel(array("id" => "123")),
                    new PayPalModel(array("id" => "321"))
                )),
            array(new PayPalModel('{"id": "123"}'), 1, array(new PayPalModel(array("id" => "123"))))
        );
    }

    public function getInvalidProvider(): array
    {
        return array(
            array('{]'),
            array('[{]')
        );
    }

    /**
     * @dataProvider getProvider
     * @param string|null $input
     * @param int $count
     * @param mixed $expected
     */
    public function testGetList($input, $count, $expected): void
    {
        $result = PayPalModel::getList($input);
        self::assertEquals($expected, $result);
        if ($input) {
            self::assertNotNull($result);
            $this->assertInternalType('array', $result);
            self::assertCount($count, $result);
        }
    }

    /**
     * @dataProvider getInvalidProvider
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid JSON String
     * @param string|null $input
     */
    public function testGetListInvalidInput($input): void
    {
        $result = PayPalModel::getList($input);
    }
}
