<?php

namespace RT\Elements;


class ButtonTest extends \PHPUnit_Framework_TestCase
{
    private $field;

    public function setUp()
    {
        $array = array(1,2,3);
        $this->field = new \RT\Elements\Button('submit', $array);
    }

    public function tearDown()
    {
        $this->field = null;
    }

    public function testFormInstance()
    {
        $this->assertInstanceOf('RT\Interfaces\ElementInterface', $this->field);
    }

    public function testGetSetName()
    {
        $this->field->setName('Teste');

        $this->assertEquals('Teste', $this->field->getName());
    }


}