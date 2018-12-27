<?php

namespace IbgeKit\src\kits\locations;

use Exception;
use IbgeKit\src\utils\Json;
use IbgeKit\src\utils\Validator;
use IbgeKit\src\utils\Route;

class Search
{
    /**
     * Base url for fetch.
     * @var string
     */
    public $baseUrl;
    /**
     * Route class for creating urls.
     * @var $defaultRoute Route
     */
    protected $defaultRoute;

    /**
     * Search constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->defaultRoute = $this->createRouterInstance();
    }

    /**
     * Retorna a resposta em formato válido.
     * @param $response
     * @param bool $asArray
     * @return mixed|null
     */
    protected function parseResponse($response, $asArray = false)
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

    /**
     * Realiza requisição e obtém a resposta.
     * @param $url
     * @return bool|string
     * @throws Exception
     */
    protected function fetch($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($httpCode !== 200)
            throw new Exception("It was not possible to fetch data from: \"{$url}\", it ended with HTTP_CODE: {$httpCode}.");
        return $response;
    }

    /**
     * Cria uma instancia do Route.
     * @return Route
     * @throws Exception
     */
    protected function createRouterInstance()
    {
        if (!empty($this->baseUrl)) {
            if (!Validator::isValidString($this->baseUrl))
                throw new Exception("Invalid baseUrl. It must be a string,  " . gettype($this->baseUrl) . ' given.');
            return new Route($this->baseUrl);
        } else
            return new Route();
    }
}
