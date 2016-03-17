<?php
namespace DrdPlus\Properties;

use Doctrineum\Integer\IntegerEnum;

abstract class AbstractIntegerProperty extends IntegerEnum implements Property
{

    /**
     * @param int $value
     *
     * @return static
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }
}
