<?php

namespace IbgeKit\src\kits\locations\structures;

use Exception;
use stdClass;

/**
 * Representa municipio brasileiro.
 * Class County
 * @package IbgeKit\src\kits\locations\locations\structures
 */
class County extends Base
{
    public $id;
    public $name;
    public $microrregiao;

    /**
     * Region constructor.
     * @param stdClass $class
     * @throws Exception
     */
    public function __construct(stdClass $class)
    {
        $attributes = get_object_vars($class);
        foreach ($attributes as $attribute => $value)
            $this->createProperty($attribute, $value);
        if (!$this->validate())
            throw new Exception('Invalid structure.');
    }

    /**
     * @return bool
     */
    private function validate()
    {
        if (isset($this->id, $this->nome, $this->microrregiao))
            return true;
        return false;
    }

    /**
     * @param stdClass $class
     * @return County
     * @throws Exception
     */
    public static function createInstanceFromStdClass(stdClass $class)
    {
        return new County($class);
    }

}