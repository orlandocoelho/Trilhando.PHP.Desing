<?php

namespace RT;

class FormTest extends \PHPUnit_Framework_TestCase
{

    private $form;

    public function setUp()
    {
        $request = new \RT\Request();
        $validator = new \RT\Validator($request);
        $this->form = new \RT\Form($validator);
    }

    public function textInstance()
    {
        $this->assertInstanceOf('RT\Interfaces\FormInterface', $this->form());
        $this->assertInstanceOf('RT\Interfaces\FormContainerField', $this->form());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function verificaSeEstaRecementoUmaClassNoCreateField()
    {
        $class = $this->form->createField();
        $this->assertInstanceOf('RT\Elements\Input', $class);
    }

}