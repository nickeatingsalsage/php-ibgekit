<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 27/12/18
 * Time: 03:17
 */

namespace IbgeKit\src\kits\locations\structures;


class Base
{

    /**
     * @param $name
     * @param $value
     */
    protected function createProperty($name, $value)
    {
        $this->{$name} = $value;
    }
}