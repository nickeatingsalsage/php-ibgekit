<?php

namespace PhpIbgeKit\Src\Base\Search;
class Search
{
    /**
     * Retorna a resposta em formato válido.
     * @param $response
     * @return mixed
     */
    public static function parseResponse($response)
    {
        return Json::decode($response);
    }
}