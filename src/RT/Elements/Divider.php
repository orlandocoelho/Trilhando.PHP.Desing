<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 06/03/15
 * Time: 18:27
 */

namespace RT\Elements;


use RT\Interfaces\ElementInterface;

class Divider implements ElementInterface
{
    public function getElement()
    {
        return "<br />";
    }

    /**
     * @return mixed
     */
    public function getName()
    {
    }

}