<?php
/**
 * Created by PhpStorm.
 * User: Orlando
 * Date: 03/02/2015
 * Time: 16:37
 */

namespace RT\Interfaces;
use RT\Interfaces\ElementInterface;

interface FormContainerField
{
    public function addField(ElementInterface $campo);
} 