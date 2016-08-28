<?php
namespace DrdPlus\Properties;

use Doctrineum\Integer\IntegerEnum;
use Granam\Integer\Tools\ToInteger;

abstract class AbstractIntegerProperty extends IntegerEnum implements Property
{

    /**
     * @param int $value
     * @return IntegerEnum|AbstractIntegerProperty
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * @param int|static $value
     * @return static
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function add($value)
    {
        return static::getIt($this->getValue() + ToInteger::toInteger($value));
    }

    /**
     * @param int|static $value
     * @return static
     * @throws \Granam\Integer\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Integer\Tools\Exceptions\ValueLostOnCast
     */
    public function sub($value)
    {
        return static::getIt($this->getValue() - ToInteger::toInteger($value));
    }
}