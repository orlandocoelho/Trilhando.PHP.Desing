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
    private $placement = 'top';

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
        $validePlacement = ['top', 'infield', 'bottom'];
        if (!in_array(strtolower($placement), $validePlacement)) {
            throw new \InvalidArgumentException("Invalid value. Must be \"top\", \"infield\" or \"bottom\"");
        }
        $this->placement = $placement;
        $form = $this->getValidator()->getMessages("<li class='alert alert-danger'>");

        $form .= "<form ";
        $form .= "action=\"{$this->action}\" ";
        $form .= "method=\"{$this->method}\" ";
        $form .= "class=\"{$this->class}\">\n";
        foreach ($this->campos as $in) {
            $form .= $in->getElement() . "\n";
        }
        $form .= "</form> \n";

       echo $form;
    }

    public function setErrorPlacement($errorPlacement = "top")
    {
        $validValues = ["top", "infield", "bottom"];
        if (!in_array(strtolower($errorPlacement), $validValues)) {
            throw new \InvalidArgumentException("Invalid value. Must be \"top\", \"infield\" or \"bottom\"");
        }

        $this->errorPlacement = $errorPlacement;
        if ($errorPlacement == "infield" && count($this->validator->getFieldsWithError()) > 0) {
            foreach ($this->validator->getFieldsWithError() as $field) {
                $field->setClass("form-control error");
                $field->setExtraAttributes([
                    "data-toggle" => "tooltip",
                    "title" => $field->getErrorMessage()
                ]);
            }
        }

        return $this;
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