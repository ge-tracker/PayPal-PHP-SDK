<?php
namespace PayPal\Test\Common;

use PayPal\Api\Payment;
use PayPal\Common\PayPalModel;
use PayPal\Core\PayPalConfigManager;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{

    public function testSimpleClassConversion(): void
    {
        $o = new SimpleClass();
        $o->setName("test");
        $o->setDescription("description");

        self::assertEquals("test", $o->getName());
        self::assertEquals("description", $o->getDescription());

        $json = $o->toJSON();
        self::assertEquals('{"name":"test","description":"description"}', $json);

        $newO = new SimpleClass();
        $newO->fromJson($json);
        self::assertEquals($o, $newO);
    }

    public function testConstructorJSON(): void
    {
        $obj = new SimpleClass('{"name":"test","description":"description"}');
        self::assertEquals($obj->getName(), "test");
        self::assertEquals($obj->getDescription(), "description");
    }

    public function testConstructorArray(): void
    {
        $arr = array('name' => 'test', 'description' => 'description');
        $obj = new SimpleClass($arr);
        self::assertEquals($obj->getName(), "test");
        self::assertEquals($obj->getDescription(), "description");
    }

    public function testConstructorNull(): void
    {
        $obj = new SimpleClass(null);
        self::assertNotEquals($obj->getName(), "test");
        self::assertNotEquals($obj->getDescription(), "description");
        self::assertNull($obj->getName());
        self::assertNull($obj->getDescription());
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage Invalid JSON String
     */
    public function testConstructorInvalidInput(): void
    {
        new SimpleClass("Something that is not even correct");
    }

    public function testSimpleClassObjectConversion(): void
    {
        $json = '{"name":"test","description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
    }

    public function testSimpleClassObjectInvalidConversion(): void
    {
        try {
            $json = '{"name":"test","description":"description","invalid":"value"}';

            $obj = new SimpleClass();
            $obj->fromJson($json);

            self::assertEquals("test", $obj->getName());
            self::assertEquals("description", $obj->getDescription());
        } catch (\PHPUnit_Framework_Error_Notice $ex) {
            // No need to do anything
        }
    }

    /**
     * Test Case to determine if the unknown object is returned, it would not add that object to the model.
     */
    public function testUnknownObjectConversion(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $json = '{"name":"test","unknown":{ "id" : "123", "object": "456"},"description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
        $resultJson = $obj->toJSON();
        self::assertContains("unknown", $resultJson);
        self::assertContains("id", $resultJson);
        self::assertContains("object", $resultJson);
        self::assertContains("123", $resultJson);
        self::assertContains("456", $resultJson);
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    /**
     * Test Case to determine if the unknown object is returned, it would not add that object to the model.
     */
    public function testUnknownArrayConversion(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $json = '{"name":"test","unknown":[{"object": { "id" : "123", "object": "456"}}, {"more": { "id" : "123", "object": "456"}}],"description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
        $resultJson = $obj->toJSON();
        self::assertContains("unknown", $resultJson);
        self::assertContains("id", $resultJson);
        self::assertContains("object", $resultJson);
        self::assertContains("123", $resultJson);
        self::assertContains("456", $resultJson);
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testEmptyArrayConversion(): void
    {
        $json = '{"id":"PAY-5DW86196ER176274EKT3AEYA","transactions":[{"related_resources":[]}]}';
        $payment = new Payment($json);
        $result = $payment->toJSON();
        self::assertContains('"related_resources":[]', $result);
        self::assertNotNull($result);
    }

    public function testMultipleEmptyArrayConversion(): void
    {
        $json = '{"id":"PAY-5DW86196ER176274EKT3AEYA","transactions":[{"related_resources":[{},{}]}]}';
        $payment = new Payment($json);
        $result = $payment->toJSON();
        self::assertContains('"related_resources":[{},{}]', $result);
        self::assertNotNull($result);
    }

    public function testSetterMagicMethod(): void
    {
        $obj = new PayPalModel();
        $obj->something = "other";
        $obj->else = array();
        $obj->there = null;
        $obj->obj = '{}';
        $obj->objs = array('{}');
        self::assertEquals("other", $obj->something);
        $this->assertInternalType('array', $obj->else);
        self::assertNull($obj->there);
        self::assertEquals('{}', $obj->obj);
        $this->assertInternalType('array', $obj->objs);
        self::assertEquals('{}', $obj->objs[0]);
    }

    public function testInvalidMagicMethodWithDisabledValidation(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $obj = new SimpleClass();
        try {
            $obj->invalid = "value2";
            self::assertEquals($obj->invalid, "value2");
        } catch (\PHPUnit_Framework_Error_Notice $ex) {
            self::fail("It should not have thrown a Notice Error as it is disabled.");
        }
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testInvalidMagicMethodWithValidationLevel(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'log'));
        $obj = new SimpleClass();
        $obj->invalid2 = "value2";
        self::assertEquals($obj->invalid2, "value2");
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testArrayClassConversion(): void
    {
        $o = new ArrayClass();
        $o->setName("test");
        $o->setDescription("description");
        $o->setTags(array('payment', 'info', 'test'));

        self::assertEquals("test", $o->getName());
        self::assertEquals("description", $o->getDescription());
        self::assertEquals(array('payment', 'info', 'test'), $o->getTags());

        $json = $o->toJSON();
        self::assertEquals('{"name":"test","description":"description","tags":["payment","info","test"]}', $json);

        $newO = new ArrayClass();
        $newO->fromJson($json);
        self::assertEquals($o, $newO);
    }

    public function testNestedClassConversion(): void
    {
        $n = new ArrayClass();
        $n->setName("test");
        $n->setDescription("description");
        $o = new NestedClass();
        $o->setId('123');
        $o->setInfo($n);

        self::assertEquals("123", $o->getId());
        self::assertEquals("test", $o->getInfo()->getName());

        $json = $o->toJSON();
        self::assertEquals('{"id":"123","info":{"name":"test","description":"description"}}', $json);

        $newO = new NestedClass();
        $newO->fromJson($json);
        self::assertEquals($o, $newO);
    }
}
