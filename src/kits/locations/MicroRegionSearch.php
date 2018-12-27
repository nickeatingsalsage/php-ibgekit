<?php

namespace IbgeKit\src\kits\locations;

use IbgeKit\src\kits\locations\structures\State;
use IbgeKit\src\utils\Route;

class MicroRegionSearch extends Search
{

    /**
     * @param State $state
     * @return
     * @throws \Exception
     */
    public function getAllByState(State $state)
    {
        $route = new Route();
        $route->setUrl('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        $route->addParams("/{$state->id}");
        $route->addParams('/microrregioes');
        $url = $route->getUrl();

        return $this->parseResponse($this->fetch($url), false);
    }
}
