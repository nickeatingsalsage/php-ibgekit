<?php

namespace PhpIbgeKit\Src\Base\Search;

use PhpIbgeKit\Src\Utils\Json;

class Search
{
    /**
     * Retorna a resposta em formato válido.
     * @param $response
     * @param bool $asArray
     * @return mixed|null
     */
    public static function parseResponse($response, $asArray = false)
    {
        $response = Json::decode($response);
        if ($asArray) {
            if (gettype($response) === 'object')
                return [$response];
        } else
            if (empty($response))
                return null;
        return $response;
    }
}