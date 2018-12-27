<?php

namespace IbgeKit\src\kits;
use Exception;
use IbgeKit\src\utils\Validator;

class StateSearch extends Search
{
    public static $url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';

    /**
     * Realiza consulta em uma lista de estados.
     * @param array $ids Lista com UFS desejadas.
     * @return array
     * @throws Exception
     */
    public function getAll($ids = [])
    {
        $url = self::$url;
        if (!empty($ids)) {
            if (!Validator::isValidIdArray($ids))
                throw new Exception('Invalid ids list. Make sure it contains only valid integers inside it , ' . gettype($ids) . ' given.');

            $url += implode('|', $ids);
        }

        return $this->sendRequest($url);
    }

    /**
     * Encontra estado pelo UF.
     * @param $id
     * @return object|null
     * @throws Exception
     */
    public function getOne($id)
    {
        if (!Validator::isInteger($id))
            throw new Exception('Invalid id type. It must be integer, ' . gettype($id) . ' given.');

        $url = self::$url . "/{$id}";
        print_r($url);
        return $this->sendRequest($url);
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
        return !empty($response);
    }

}

