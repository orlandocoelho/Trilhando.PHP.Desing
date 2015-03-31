<?php

namespace RT\Elements;


use RT\Database\Dados;
use RT\Database\ServicesDB;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    private $field;

    public function setUp()
    {
        $dados = new Dados((new ServicesDB())->conexao());
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
}