<?php

namespace RT\Elements;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    private $field;

    public function setUp()
    {

        $dados = $this->getMockBuilder('\RT\Database\Dados')
            ->disableOriginalConstructor()
            ->getMock('\RT\Database\Dados')
        ;

        $array = array(1,2,3);
        $this->field = new \RT\Elements\Select($dados, $array);
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