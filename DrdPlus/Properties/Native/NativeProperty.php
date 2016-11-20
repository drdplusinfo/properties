<?php
namespace DrdPlus\Properties\Native;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Properties\Property;

abstract class NativeProperty extends BooleanEnum implements Property
{

    /**
     * @param bool $value
     * @return NativeProperty
     * @throws \Doctrineum\Boolean\Exceptions\UnexpectedValueToConvert
     */
    public static function getIt($value)
    {
        return new static($value);
    }
}