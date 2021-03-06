<?php

namespace RT\Elements;

use RT\Interfaces\ElementInterface;

class Input implements ElementInterface
{
    use \RT\Traits\ErrorTrait;

    private $validType = array('text', 'email', 'number', 'hidden');
    private $type;
    private $name;
    private $class;
    private $placeholder;
    private $value;
    private $id;
    private $required = false;

    public function __construct($type = 'text', Array $array)
    {
        if(!in_array($this->validType, $array))
        {
            $type = 'text';
        }
        $this->type = $type;
        foreach ($array as $attribute => $value) {
            $this->$attribute = $value;
        }
    }

    public function getElement()
    {
        $in = "<input type=\"{$this->type}\" ";
        $in .= "id=\"{$this->id}\" ";
        $in .= "name=\"{$this->name}\" ";
        $in .= "class=\"{$this->class}\" ";
        $in .= "value=\"{$this->value}\" ";
        $in .= "placeholder=\"{$this->placeholder}\" ";
        $in .= "required=\"{$this->required}\" ";
        $in .= " />";

        if (!is_null($this->errorMessage)) {
            $in .= "<span class='text-danger'>{$this->errorMessage}</span>";
        }


        return $in;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}