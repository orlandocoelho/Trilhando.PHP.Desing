<?php

namespace RT\Elements;

class FieldSetTest extends \PHPUnit_Framework_TestCase
{

    private $field;

    public function setUp()
    {
        $this->field = new \RT\Elements\FieldSet();
    }

    public function tearDown()
    {
        $this->field = null;
    }

    public function testFormInstance()
    {
        $this->assertInstanceOf('RT\Interfaces\FormContainerField', $this->field);
        $this->assertInstanceOf('RT\Interfaces\ElementInterface', $this->field);
    }
}