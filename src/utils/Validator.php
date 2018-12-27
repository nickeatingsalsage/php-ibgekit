<?php

namespace IbgeKit\src\utils;

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

    /**
     * Verifica se é um número inteiro válido.
     * @param $value
     * @return mixed
     */
    public static function isInteger($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT);
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isArray($value)
    {
        return is_array($value);
    }

    /**
     * Verifica se é uma lista de ids inteiros válido
     * @param $ids
     * @return bool
     */
    public static function isValidIdArray($ids)
    {
        if (self::isArray($ids)) {
            foreach ($ids as $id)
                if (!self::isInteger($id))
                    return false;
            return true;
        }
        return false;
    }
}