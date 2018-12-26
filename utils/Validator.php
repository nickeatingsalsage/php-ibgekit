<?php

namespace ibgekit\utils;

class Validator
{
    /**
     * Verifica se é um json válido.
     * @param $value
     * @return bool
     */
    public static function isJson($value)
    {
        $value = json_decode($value);
        if (is_null($value))
            return false;
        return (json_last_error() == JSON_ERROR_NONE);
    }
}