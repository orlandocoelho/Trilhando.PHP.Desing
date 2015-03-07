<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 06/03/15
 * Time: 18:27
 */

namespace RT;


use RT\Interfaces\ElementInterface;

class Divider implements ElementInterface
{
    public function getElement()
    {
        return "<br />";
    }

}