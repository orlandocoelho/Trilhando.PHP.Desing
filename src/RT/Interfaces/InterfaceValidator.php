<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 11/03/15
 * Time: 10:05
 */

namespace RT\Interfaces;


interface InterfaceValidator
{
    function validate();
    function addRule(Array $array);
}