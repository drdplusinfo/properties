<?php
namespace DrdPlus\Properties;

use Doctrineum\Float\FloatEnum;
use Granam\Float\FloatInterface;
use Granam\Float\Tools\ToFloat;

abstract class AbstractFloatProperty extends FloatEnum implements Property, FloatInterface
{

    /**
     * @param float $value
     * @return static
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * @param float|static $value
     * @return static
     * @throws \Granam\Number\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Scalar\Tools\Exceptions\WrongParameterType
     */
    public function add($value)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getIt($this->getValue() + ToFloat::toFloat($value));
    }

    /**
     * @param float|static $value
     * @return static
     * @throws \Granam\Number\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Scalar\Tools\Exceptions\WrongParameterType
     */
    public function sub($value)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getIt($this->getValue() - ToFloat::toFloat($value));
    }

}