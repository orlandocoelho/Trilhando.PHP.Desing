<?php

namespace RT\Elements;

use RT\Interfaces\ElementInterface;

class Textarea implements ElementInterface
{

    private $id;
    private $nome;
    private $value;
    private $class;
    private $placeholder;
    private $rows = 4;
    private $col;
    private $required = false;

    public function __construct(array $array = array())
    {
        foreach ($array as $attribute => $value) {
            $this->$attribute = $value;
        }
    }

    public function getElement()
    {
        $in = "<textarea ";
        $in .= "id=\"{$this->id}\" ";
        $in .= "name=\"{$this->nome}\" ";
        $in .= "class=\"{$this->class}\" ";
        $in .= "placeholder=\"{$this->placeholder}\" ";
        $in .= "rows=\"{$this->rows}\" ";
        $in .= "col=\"{$this->col}\" ";
        $in .= "required=\"{$this->required}\" ";
        $in .= ">{$this->value}</textarea>";

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
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}