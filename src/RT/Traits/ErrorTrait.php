<?php

namespace RT\Traits;

trait ErrorTrait {

    protected $errorMessage;

    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
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