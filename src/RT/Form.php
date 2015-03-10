<?php

namespace RT;

use RT\Interfaces\FormContainerField;
use RT\Interfaces\FormInterface;
use RT\Traits\FieldTrait;
use RT\Exception\ClassNotFoundException;

class Form implements FormInterface, FormContainerField
{
    use FieldTrait;

    private $action = "";
    private $class = "";
    private $method = 'POST';
    private $validator;
    private $field;

    private static $typesDir = "RT\\Elements\\";

    public function __construct(Validator $validator, $action = "", $class = "", $method = 'POST')
    {
        $this->validator = $validator;
        $this->action = $action;
        $this->class = $class;
        $this->method = $method;
    }

    public function createField($getClass, $type = null, array $array = array() )
    {
        $class = self::$typesDir.ucfirst($getClass);
        if (!class_exists($class)) {
            throw new ClassNotFoundException("Field class unknown: {$class}");
        }
        $this->field = new $class($type, $array);


        return $this->field;

    }

    public function popular(Array $array)
    {

        foreach ($this->field->campos as $field) {
            var_dump($field->getName());
        }

        foreach ($array as $key => $value) {
        }
    }

    public function render()
    {
        $form = "<form ";
        $form .= "action=\"{$this->action}\" ";
        $form .= "method=\"{$this->method}\" ";
        $form .= "class=\"{$this->class}\">\n";
        foreach ($this->campos as $in) {
            $form .= $in->getElement() . "\n";
        }
        $form .= "</form> \n";

       echo $form;
    }

}