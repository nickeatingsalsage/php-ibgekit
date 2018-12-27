<?php

namespace IbgeKit\src\kits;

use Exception;
use IbgeKit\src\utils\Json;
use IbgeKit\src\utils\Validator;

class Search
{
    /**
     * Retorna a resposta em formato válido.
     * @param $response
     * @param bool $asArray
     * @return mixed|null
     */
    protected static function parseResponse($response, $asArray = false)
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

    protected function sendRequest($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode !== 200)
            throw new Exception("It was not possible to fetch data from: \"{$url}\", it ended with HTTP_CODE: {$httpCode}.");
        $response = self::parseResponse($response, false);

        return $response;
    }
}
