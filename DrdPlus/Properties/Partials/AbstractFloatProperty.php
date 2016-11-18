<?php
namespace DrdPlus\Properties\Partials;

use Doctrineum\Float\FloatEnum;
use DrdPlus\Properties\Property;
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