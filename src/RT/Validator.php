<?php
/**
 * Created by PhpStorm.
 * User: Orlando
 * Date: 03/02/2015
 * Time: 15:36
 */

namespace RT;

class Validator
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}