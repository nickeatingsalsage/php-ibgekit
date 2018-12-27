<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 27/12/2018
 * Time: 08:47
 */

namespace IbgeKit\src\kits\locations;


use Exception;
use IbgeKit\src\utils\Route;
use IbgeKit\src\utils\Validator;

class RegionSearch extends Search
{
    /**
     * Obtém a lista de todos os municípios
     * @param $ids []
     * @return mixed
     * @throws Exception
     */
    public function getAll($ids = []){
//        $url = $this->defaultRoute->getUrl();
//        if (!empty($ids)) {
//            if (!Validator::isValidIdArray($ids))
//                throw new Exception('Invalid ids list. Make sure it contains only valid integers inside it , ' . gettype($ids) . ' given.');
//            $ids = '/'.implode('|',$ids);
//        }

        $ids = Validator::idsArray($ids);

        $route = new Route();
        $route->setUrl('https://servicodados.ibge.gov.br/api/v1/localidades');
        $route->addParams('/regioes/'.$ids);
        $url = $route->getUrl();

        return $this->parseResponse($this->fetch($url), false);
    }

    /**
     * @param $id
     * @return mixed|null
     * @throws Exception
     */
    public function getOne($id){
        $route = new Route();
        $route->setUrl('https://servicodados.ibge.gov.br/api/v1/localidades');
        $route->addParams('/regioes/'.$id);
        $url = $route->getUrl();

        return$this->parseResponse($this->fetch($url),false);
    }
}