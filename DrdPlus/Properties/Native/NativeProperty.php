<?php
namespace DrdPlus\Properties\Native;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Properties\PropertyInterface;

abstract class NativeProperty extends BooleanEnum implements PropertyInterface
{

    /**
     * @param bool $value
     * @return static
     */
    public static function getIt($value)
    {
        return new static($value);
    }
}
