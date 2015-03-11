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
    private $elementName = array();

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
        $this->field = new $class($type, $array);

        $this->setElementName($this->field);

        return $this->field;
    }



    public function popular(Array $array)
    {
        foreach ($array as $key => $value) {
            foreach ($this->getElementName() as $elementName) {
                $elementName->getName() == $key ? $elementName->setValue($value) : null;
            }
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

    /**
     * @return array
     */
    public function getElementName()
    {
        return $this->elementName;
    }

    /**
     * @param array $elementName
     */
    public function setElementName($elementName)
    {
        $this->elementName[] = $elementName;
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