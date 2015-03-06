<?php

namespace RT;

use RT\Interfaces\FormContainerField;
use RT\Interfaces\FormInterface;
use RT\Traits\FieldTrait;
use RT\Input;
use RT\Textarea;
use RT\Button;
use RT\FieldSet;


class Form implements FormInterface, FormContainerField
{

    use FieldTrait;

    private $action = "";
    private $class = "";
    private $method = 'POST';
    private $validator;

    public function __construct(Validator $validator, $action = "", $class = "", $method = 'POST')
    {
        $this->validator = $validator;
        $this->action = $action;
        $this->class = $class;
        $this->method = $method;
    }

    public function createField($field, $type = null, array $array = array() )
    {
        switch(strtolower($field)){
            case 'input':
                $field = new Input($type, $array);
                break;
            case 'textarea':
                $field = new Textarea($array);
                break;
            case 'button':
                $field = new Button($type, $array);
                break;
            case 'fieldset':
                $field = new FieldSet();
                break;
            default;
        }

        return $field;
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