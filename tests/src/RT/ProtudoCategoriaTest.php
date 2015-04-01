<?php

namespace RT;

class ProtudoCategoriaTest extends \PHPUnit_Framework_TestCase
{

    private $produto;

    public function setUp()
    {
        $this->produto = new \RT\ProtudoCategoria();
    }

    public function tearDown()
    {
        $this->produto = null;
    }

    public function  testInstance()
    {
        $this->assertInstanceOf('\RT\Interfaces\ProdutoCatergoriaInterface', $this->produto);
    }

    public function testVerificaGetSetId()
    {
        $this->produto->setId('1');

        $this->assertEquals('1', $this->produto->getId());
    }

    public function testVerificaGetSetNome()
    {
        $this->produto->setNome('Orlando');

        $this->assertEquals('Orlando', $this->produto->getNome());
    }
}