<?php

namespace IbgeKit\src\kits\locations;

use Exception;
use IbgeKit\src\kits\locations\structures\State;
use IbgeKit\src\utils\Validator;
use stdClass;

class StateSearch extends Search
{
    /**
     * Router class for creating urls.
     * @var $route Router
     */
    protected $route;
    /**
     * Base url for fetch.
     * @var string
     */
    public $baseUrl = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';

    /**
     * @param $response
     * @param bool $asArray
     * @return array|State|mixed|null
     * @throws Exception
     */
    protected function parseResponse($response, $asArray = false)
    {
        $response = parent::parseResponse($response, $asArray);
        if (is_array($response))
            foreach ($response as $key => $record)
                $response[$key] = State::createInstanceFromStdClass($record);
        elseif ($response instanceof stdClass)
            $response = State::createInstanceFromStdClass($response);

        return $response;
    }

    /**
     * Obtém lista de estados.
     * @param array $ids Lista com UFS desejadas.
     * @return array
     * @throws Exception
     */
    public function getAll($ids = [])
    {
        $url = $this->route->getUrl();
        if (!empty($ids)) {
            if (!Validator::isValidIdArray($ids))
                throw new Exception('Invalid ids list. Make sure it contains only valid integers inside it , ' . gettype($ids) . ' given.');

            $url .= implode('|', $ids);
        }

        return $this->parseResponse($this->fetch($url), true);
    }

    /**
     * Obtém estado por UF.
     * @param $id
     * @return object|null
     * @throws Exception
     */
    public function getOne($id)
    {
        if (!Validator::isInteger($id))
            throw new Exception('Invalid id type. It must be integer, ' . gettype($id) . ' given.');
        $url = $this->route->getUrl() . "/{$id}";

        return $this->parseResponse($this->fetch($url), false);
    }

    /**
     * Verifica se determinado estado existe.
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function exists($id)
    {
        $response = $this->getOne($id);
        if (is_null($response))
            return false;
        return true;
    }
}

