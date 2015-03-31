<?php
/**
 * Created by PhpStorm.
 * User: orlando
 * Date: 31/03/15
 * Time: 14:45
 */

namespace RT\Elements;


class DividerTest extends \PHPUnit_Framework_TestCase
{

    private $field;

    public function setUp()
    {
    $this->field = new \RT\Elements\Divider();
    }

    public function tearDown()
    {
    $this->field = null;
    }

    public function testFormInstance()
    {
    $this->assertInstanceOf('RT\Interfaces\ElementInterface', $this->field);
    }
}