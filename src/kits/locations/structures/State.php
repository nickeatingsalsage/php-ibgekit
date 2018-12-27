<?php

namespace IbgeKit\src\kits\locations\structures;

use Exception;
use IbgeKit\src\kits\locations\locations\structures\Region;
use stdClass;

class State extends Base
{
    /**
     * State constructor.
     * @param stdClass $class
     * @throws Exception
     */
    public function __construct(stdClass $class)
    {
        $attributes = get_object_vars($class);
        foreach ($attributes as $attribute => $value)
            if ($attribute === 'regiao')
                $this->createProperty($attribute, Region::createInstanceFromStdClass($value));
            else
                $this->createProperty($attribute, $value);
        if (!$this->validate())
            throw new Exception('Invalid structure.');
    }

    /**
     * @return bool
     */
    private function validate()
    {
        if (isset($this->id, $this->sigla, $this->nome, $this->regiao))
            return true;
        return false;
    }

    /**
     * @param stdClass $class
     * @return State
     * @throws Exception
     */
    public static function createInstanceFromStdClass(stdClass $class)
    {
        return new State($class);
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->regiao;
    }
}