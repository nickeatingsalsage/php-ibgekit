<?php

namespace PhpIbgeKit\Src\Kits\Places;

use PhpIbgeKit\Src\Base\Search\Search;

class UfSearch extends Search
{
    /**
     * UfSearch constructor.
     */
    public function __construct()
    {
    }

    /**
     * Retorna lista com todas as Unidades Federais disponíveis.
     * @return bool|mixed|string
     */
    public function getAll()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = self::parseResponse($response);
        return $response;
    }
}

