<?php

namespace RT\Elements;

class TextareaTest extends \PHPUnit_Framework_TestCase
{
    private $field;

    public function setUp()
    {
        $array = array(1,2,3);
        $this->field = new \RT\Elements\Textarea($array);
    }

    public function tearDown()
    {
        $this->field = null;
    }

    public function testFormInstance()
    {
        $this->assertInstanceOf('RT\Interfaces\ElementInterface', $this->field);
    }
}