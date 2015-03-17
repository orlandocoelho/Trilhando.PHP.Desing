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
        $class = self::$typesDir.$getClass;
        if (!class_exists($class)) {
            throw new ClassNotFoundException("Field class unknown: {$class}");
        }

        return new $class($type, $array);
    }

    public function popular(Array $array)
    {
        foreach ($array as $key => $value) {
            $campo = $this->findFieldByName($key);
            if (null !== $campo) {
                $campo->setValue($value);
            }
        }
    }

    public function render($placement = 'top')
    {
        $this->validator->validate();

        $form = "";

        if($placement == 'top') {
            $form .= $this->validator->getMessages("<li class='alert alert-danger'>");
        }

        $form .= "<form ";
        $form .= "action=\"{$this->action}\" ";
        $form .= "method=\"{$this->method}\" ";
        $form .= "class=\"{$this->class}\">\n";
        foreach ($this->campos as $in) {
            $form .= $in->getElement() . "\n";
                foreach($in->campos as $val) {
                    if ($placement == 'infield' && in_array($val, $this->validator->getFieldError())) {
                        $form .= "<span class='text-danger'>" . $this->validator->getArrayMessages()[$val->getName()] . "</span>\n";
                    }
                }
            }

        $form .= "</form> \n";

        if($placement == 'bottom') {
            $form .= $this->validator->getMessages("<li class='alert alert-danger'>");
        }

        echo $form;

    }

    /**
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param Validator $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

}