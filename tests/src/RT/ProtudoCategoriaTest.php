<?php

namespace RT;

class ProtudoCategoriaTest extends \PHPUnit_Framework_TestCase
{

    public function  testInstance()
    {
        $produto = new \RT\ProtudoCategoria();
        $this->assertInstanceOf('\RT\Interfaces\ProdutoCatergoriaInterface', $produto);
    }

    public function testVerificaGetSetId()
    {
        $produto = new \RT\ProtudoCategoria();
        $produto->setId('1');

        $this->assertEquals('1', $produto->getId());
    }

    public function testVerificaGetSetNome()
    {
        $produto = new \RT\ProtudoCategoria();
        $produto->setNome('Orlando');

        $this->assertEquals('Orlando', $produto->getNome());
    }
}