<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 06/03/15
 * Time: 18:33
 */

namespace RT\Elements;

use RT\Database\Dados;
use RT\Interfaces\ElementInterface;

class Select implements ElementInterface
{
    private $name;
    private $class;
    private $id;

    public function __construct(Dados $dados, Array $array)
    {
        $this->dados = $dados;
        foreach ($array as $attribute => $value) {
            $this->$attribute = $value;
        }
    }

    public function getElement()
    {
        $in = "<select ";
        $in .= "id=\"{$this->id}\" ";
        $in .= "name=\"{$this->name}\" ";
        $in .= "class=\"{$this->class}\" ";
        $in .= " />";

        foreach ($this->dados->read() as $read) {
            $in .= "<option value=\"{$read['nome']}\">{$read['nome']}</option>";
        }

        $in .= "</select>";
        return $in;
    }
}