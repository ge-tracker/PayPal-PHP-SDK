<?php
namespace PayPal\Test\Common;

use PayPal\Api\Payment;
use PayPal\Common\PayPalModel;
use PayPal\Core\PayPalConfigManager;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{

    public function testSimpleClassConversion()
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

    public function testConstructorJSON()
    {
        $obj = new SimpleClass('{"name":"test","description":"description"}');
        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
    }

    public function testConstructorArray()
    {
        $arr = array('name' => 'test', 'description' => 'description');
        $obj = new SimpleClass($arr);
        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
    }

    public function testConstructorNull()
    {
        $obj = new SimpleClass(null);
        self::assertNotEquals("test", $obj->getName());
        self::assertNotEquals("description", $obj->getDescription());
        self::assertNull($obj->getName());
        self::assertNull($obj->getDescription());
    }

    public function testConstructorInvalidInput()
    {
        $this->expectExceptionMessage("Invalid JSON String");
        $this->expectException(\InvalidArgumentException::class);
        new SimpleClass("Something that is not even correct");
    }

    public function testSimpleClassObjectConversion()
    {
        $json = '{"name":"test","description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
    }

    public function testSimpleClassObjectInvalidConversion()
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
    public function testUnknownObjectConversion()
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $json = '{"name":"test","unknown":{ "id" : "123", "object": "456"},"description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
        $resultJson = $obj->toJSON();
        self::assertStringContainsString("unknown", $resultJson);
        self::assertStringContainsString("id", $resultJson);
        self::assertStringContainsString("object", $resultJson);
        self::assertStringContainsString("123", $resultJson);
        self::assertStringContainsString("456", $resultJson);
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    /**
     * Test Case to determine if the unknown object is returned, it would not add that object to the model.
     */
    public function testUnknownArrayConversion()
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $json = '{"name":"test","unknown":[{"object": { "id" : "123", "object": "456"}}, {"more": { "id" : "123", "object": "456"}}],"description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        self::assertEquals("test", $obj->getName());
        self::assertEquals("description", $obj->getDescription());
        $resultJson = $obj->toJSON();
        self::assertStringContainsString("unknown", $resultJson);
        self::assertStringContainsString("id", $resultJson);
        self::assertStringContainsString("object", $resultJson);
        self::assertStringContainsString("123", $resultJson);
        self::assertStringContainsString("456", $resultJson);
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testEmptyArrayConversion()
    {
        $json = '{"id":"PAY-5DW86196ER176274EKT3AEYA","transactions":[{"related_resources":[]}]}';
        $payment = new Payment($json);
        $result = $payment->toJSON();
        self::assertStringContainsString('"related_resources":[]', $result);
        self::assertNotNull($result);
    }

    public function testMultipleEmptyArrayConversion()
    {
        $json = '{"id":"PAY-5DW86196ER176274EKT3AEYA","transactions":[{"related_resources":[{},{}]}]}';
        $payment = new Payment($json);
        $result = $payment->toJSON();
        self::assertStringContainsString('"related_resources":[{},{}]', $result);
        self::assertNotNull($result);
    }

    public function testSetterMagicMethod()
    {
        $obj = new PayPalModel();
        $obj->something = "other";
        $obj->else = array();
        $obj->there = null;
        $obj->obj = '{}';
        $obj->objs = array('{}');
        self::assertEquals("other", $obj->something);
        self::assertIsArray($obj->else);
        self::assertNull($obj->there);
        self::assertEquals('{}', $obj->obj);
        self::assertIsArray($obj->objs);
        self::assertEquals('{}', $obj->objs[0]);
    }

    public function testInvalidMagicMethodWithDisabledValidation()
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'disabled'));
        $obj = new SimpleClass();
        try {
            $obj->invalid = "value2";
            self::assertEquals("value2", $obj->invalid);
        } catch (\PHPUnit_Framework_Error_Notice $ex) {
            self::fail("It should not have thrown a Notice Error as it is disabled.");
        }
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testInvalidMagicMethodWithValidationLevel()
    {
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'log'));
        $obj = new SimpleClass();
        $obj->invalid2 = "value2";
        self::assertEquals("value2", $obj->invalid2);
        PayPalConfigManager::getInstance()->addConfigs(array('validation.level' => 'strict'));
    }

    public function testArrayClassConversion()
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

    public function testNestedClassConversion()
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
