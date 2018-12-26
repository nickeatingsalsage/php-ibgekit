<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 26/12/18
 * Time: 18:35
 */

namespace ibgekit\utils;

use ParseError;

class Json
{
    /**
     * Verifica se é um json.
     * @param null $value
     * @return bool
     */
    private static function isJson($value = null)
    {
        return Validator::isJson($value);
    }

    /**
     * Transforma uma string json.
     * @param $json
     * @return bool|mixed
     */
    public static function decode($json)
    {
        if (self::isJson($json))
            return json_decode($json);
        return false;
    }

    /**
     * Transforma para uma string json.
     * @param $value
     * @return false|string
     */
    public static function encode($value)
    {
        $value = json_encode($value);
        if (!$value)
            throw new ParseError('It was not possible to decode this variable.');
        return $value;
    }
}