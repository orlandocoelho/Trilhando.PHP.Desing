<?php

namespace RT\Elements;

use RT\Interfaces\ElementInterface;

class Input implements ElementInterface
{
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

        return $in;
    }

}