<?php
namespace DrdPlus\Properties;

use Doctrineum\Integer\IntegerEnum;
use Granam\Integer\Tools\ToInteger;

abstract class AbstractIntegerProperty extends IntegerEnum implements Property
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
     * @param int|float|AbstractFloatProperty $value
     * @return AbstractIntegerProperty
     * @throws \Granam\Number\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Scalar\Tools\Exceptions\WrongParameterType
     */
    public function add($value)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getIt($this->getValue() + ToInteger::toInteger($value));
    }

    /**
     * @param int|float|AbstractFloatProperty $value
     * @return AbstractIntegerProperty
     * @throws \Granam\Number\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Scalar\Tools\Exceptions\WrongParameterType
     */
    public function sub($value)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getIt($this->getValue() - ToInteger::toInteger($value));
    }
}