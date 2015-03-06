<?php

namespace RT;

use RT\Interfaces\ElementInterface;

class Button implements ElementInterface
{

    private $validType = array('reset', 'submit');
    private $type;
    private $class;
    private $id;
    private $value = "Button";

    public function __construct($type="reset", Array $array = array())
    {
        if(!in_array($this->validType, $array)){
            $type="reset";
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
        $in .= " />";

        return $in;
    }
}