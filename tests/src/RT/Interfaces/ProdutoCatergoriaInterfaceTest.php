<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 31/03/15
 * Time: 14:54
 */

namespace RT\Interfaces;


class ProdutoCatergoriaInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testInterfaceExists()
    {
        $this->assertTrue(interface_exists('RT\Interfaces\ProdutoCatergoriaInterface'));
    }
}