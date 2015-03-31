<?php

namespace RT;

use RT\Elements\Button;

class FormTest extends \PHPUnit_Framework_TestCase
{

    private $form;

    public function setUp()
    {
        $request = new \RT\Request();
        $validator = new \RT\Validator($request);
        $this->form = new \RT\Form($validator);
    }

    public function testFormInstance()
    {
        $this->assertInstanceOf('RT\Interfaces\FormInterface', $this->form);
        $this->assertInstanceOf('RT\Interfaces\FormContainerField', $this->form);
    }

//    /**
//     * @expectedException \RT\Exception\ClassNotFoundException
//     */
//    public function testVerificaSeEstaRecebendoUmaClassNoCreateField()
//    {
//        $this->form->createField();
//    }

}