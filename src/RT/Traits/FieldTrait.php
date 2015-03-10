<?php

namespace RT\Traits;

use RT\Interfaces\ElementInterface;

trait FieldTrait
{
    public $campos = array();

    public function addField(ElementInterface $campo)
    {
        $this->campos[] = $campo;
        return $this;
    }
}