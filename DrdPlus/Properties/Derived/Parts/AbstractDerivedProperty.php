<?php
namespace DrdPlus\Properties\Derived\Parts;

use Granam\Integer\IntegerObject;

abstract class AbstractDerivedProperty extends IntegerObject implements DerivedPropertyInterface
{

    public static function getIt($value)
    {
        return new static($value);
    }
}
