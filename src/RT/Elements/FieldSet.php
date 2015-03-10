<?php

namespace RT\Elements;

use RT\Interfaces\ElementInterface;
use RT\Interfaces\FormContainerField;
use RT\Traits\FieldTrait;

class FieldSet implements FormContainerField, ElementInterface
{

    use FieldTrait;

    private $id;
    private $class;



    public function getElement()
    {
        $in = "<fieldset ";
        $in .= "id=\"{$this->id}\"";
        $in .= "class=\"{$this->class}\">\n";
        foreach($this->campos as $field){
            $in .= $field->getElement();
        }
        $in .= "</fieldset>";

        return $in;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }



}