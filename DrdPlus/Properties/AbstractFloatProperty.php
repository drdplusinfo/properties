<?php
namespace DrdPlus\Properties;

use Doctrineum\Float\FloatEnum;
use Granam\Float\FloatInterface;

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

}