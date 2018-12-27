<?php

namespace src\kits;

use Exception;

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

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = self::parseResponse($response, true);

        return $response;
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
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);
        $response = self::parseResponse($response, false);

        return $response;
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

