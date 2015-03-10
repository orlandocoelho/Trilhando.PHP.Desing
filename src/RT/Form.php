<?php

namespace RT;

use RT\Database\Dados;
use RT\Interfaces\FormContainerField;
use RT\Interfaces\FormInterface;
use RT\Traits\FieldTrait;
use RT\Input;
use RT\Textarea;
use RT\Button;
use RT\FieldSet;
use RT\Database\ServicesDB;

class Form implements FormInterface, FormContainerField
{

    use FieldTrait;

    private $action = "";
    private $class = "";
    private $method = 'POST';
    private $validator;
    private $field;


    public function __construct(Validator $validator, $action = "", $class = "", $method = 'POST')
    {
        $this->validator = $validator;
        $this->action = $action;
        $this->class = $class;
        $this->method = $method;
    }

    public function createField($fieldDesejado, $type = null, array $array = array() )
    {
        switch(strtolower($fieldDesejado)){
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
            case 'select':
                $field = new Select(new Dados((new ServicesDB())->conexao()), $array);
                break;
            default:
                $field = new Divider();
                break;
        }

        $this->field = $field;
        return $this->field;
    }

    public function popular(Array $array)
    {
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