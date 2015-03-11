<?php

namespace RT\Traits;

use RT\Interfaces\ElementInterface;
use RT\Interfaces\FormContainerField;


trait FieldTrait
{
    public $campos = array();

    public function addField(ElementInterface $campo)
    {
        $this->campos[] = $campo;
        return $this;
    }

    public function findFieldByName($name)
    {
        foreach($this->campos as $campo)
        {
            if ($campo instanceof FormContainerField) {
                return $campo->findFieldByName($name);
            }
            if (method_exists($campo, 'getName') && $campo->getName() == $name) {
                return $campo;
            }
        }
        return null;
    }

}