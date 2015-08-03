<?php
namespace DrdPlus\Properties;

use Doctrineum\Integer\IntegerEnum;
use Granam\Integer\IntegerInterface;

abstract class AbstractIntegerProperty extends IntegerEnum implements PropertyInterface, IntegerInterface
{

    /**
     * @param int $value
     *
     * @return AbstractIntegerProperty
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->getEnumValue();
    }

}
