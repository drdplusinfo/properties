<?php
namespace DrdPlus\Properties;

use Doctrineum\Float\FloatEnum;
use Granam\Float\FloatInterface;
use Granam\Float\Tools\ToFloat;

/**
 * @method static AbstractFloatProperty getEnum(float $enumValue)
 */
abstract class AbstractFloatProperty extends FloatEnum implements Property, FloatInterface
{

    /**
     * @param float $value
     * @return AbstractFloatProperty
     */
    public static function getIt($value)
    {
        return static::getEnum($value);
    }

    /**
     * @param float|static $value
     * @return AbstractFloatProperty
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
     * @return AbstractFloatProperty
     * @throws \Granam\Number\Tools\Exceptions\WrongParameterType
     * @throws \Granam\Scalar\Tools\Exceptions\WrongParameterType
     */
    public function sub($value)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getIt($this->getValue() - ToFloat::toFloat($value));
    }

}