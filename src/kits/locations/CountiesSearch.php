<?php

namespace IbgeKit\src\kits\locations;

use IbgeKit\src\kits\locations\structures\County;
use IbgeKit\src\kits\locations\structures\State;
use IbgeKit\src\utils\Route;
use stdClass;

class CountiesSearch extends Search
{

    /**
     * @param $response
     * @param bool $asArray
     * @return County[]|County|null
     * @throws \Exception
     */
    protected function parseResponse($response, $asArray = false)
    {
        $response = parent::parseResponse($response, $asArray);
        if (is_array($response))
            foreach ($response as $key => $record)
                $response[$key] = County::createInstanceFromStdClass($record);
        elseif ($response instanceof stdClass)
            $response = County::createInstanceFromStdClass($response);

        return $response;
    }

    /**
     * @param State $state
     * @return County[]
     * @throws \Exception
     */
    public function getAllByState(State $state)
    {
        $route = new Route();
        $route->setUrl('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        $route->addParams("/{$state->id}");
        $route->addParams('/municipios');
        $url = $route->getUrl();

        return $this->parseResponse($this->fetch($url), false);
    }
}