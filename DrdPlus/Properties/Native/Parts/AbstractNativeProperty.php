<?php
namespace DrdPlus\Properties\Native\Parts;

use Doctrineum\Boolean\BooleanEnum;
use DrdPlus\Properties\PropertyInterface;

abstract class AbstractNativeProperty extends BooleanEnum implements PropertyInterface
{

    public static function getIt($value)
    {
        return new static($value);
    }
}
