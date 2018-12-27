<?php


namespace IbgeKit\src\utils;

use Exception;

class Router
{
    private $url = '';

    /**
     * Router constructor.
     * @param string $url
     * @throws Exception
     */
    public function __construct($url = null)
    {
        if (is_string($url))
            $this->setUrl($url);
    }

    /**
     * Define url.
     * @param $url
     * @return mixed
     * @throws Exception
     */
    public function setUrl($url)
    {
        if (!Validator::isValidUrl($url))
            throw new Exception('Invalid url.');
        return $this->url = $url;
    }

    /**
     * Retorna url base.
     * @return mixed
     */
    public function getUrl()
    {
        return (string)$this->url;
    }

    /**
     * Adiciona paramêtros a rota.
     * @param $params
     * @throws Exception
     */
    public function addParams($params)
    {
        if (is_integer($params))
            $this->url = "{$this->getUrl()}/{$params}";
        elseif (is_array($params))
            $this->url = "{$this->getUrl()}/" . implode('|', $params);
        elseif (is_string($params))
            $this->url = "{$this->getUrl()}/{$params}";
        else
            throw new Exception("Invalid param type.");
    }

    /**
     * Returns last word from url.
     * @param $url
     * @return bool
     */
    public static function getLastWordFromUrl($url)
    {
        return basename(parse_url($url, PHP_URL_PATH));
    }

    /**
     * Creates a copy of Object Router.
     * @param Router $router
     * @return Router
     * @throws Exception
     */
    public static function createFromInstance(Router $router)
    {
        return new Router($router->getUrl());
    }
}


