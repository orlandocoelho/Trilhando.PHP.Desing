<?php

namespace RT\Elements;

class InputTest extends \PHPUnit_Framework_TestCase
{

    private $field;

    public function setUp()
    {
        $array = array(1,2,3);
        $this->field = new \RT\Elements\Input('text', $array);
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