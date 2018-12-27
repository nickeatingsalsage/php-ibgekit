<?php

namespace IbgeKit\src\kits;

use IbgeKit\src\utils\Json;

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
        echo var_dump($response);
        $response = Json::decode($response);
        if ($asArray) {
            if (gettype($response) === 'object')
                return [$response];
        } else
            if (empty($response))
                return null;
        return $response;
    }

    public function sendRequest($url){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = self::parseResponse($response, false);

        return $response;
    }
}
