<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 27/12/18
 * Time: 02:54
 */

namespace IbgeKit\src\kits\locations\structures;


use Exception;
use IbgeKit\src\kits\locations\structures\Base;
use stdClass;

/**
 * Representa região brasileira.
 * Class Region
 * @package IbgeKit\src\kits\locations\structures
 */
class MesoRegion extends Base
{
    public $id;
    public $nome;
    public $UF;

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
        if (isset($this->id, $this->nome, $this->UF))
            return true;
        return false;
    }

    /**
     * @param stdClass $class
     * @return MesoRegion
     * @throws Exception
     */
    public static function createInstanceFromStdClass(stdClass $class)
    {
        return new MesoRegion($class);
    }
}