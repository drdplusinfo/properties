<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\PropertyInterface;
use Granam\Integer\IntegerObject;

/**
 * Note: Size does not need to be persisted and therefore does not need enum type.
 * Can be anytime calculated by race, gender and strength at first level.
 * @see PPH page 33 left column
 */
class Size extends IntegerObject implements PropertyInterface
{
    const SIZE = 'size';

    public static function getIt($value)
    {
        return new static($value);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SIZE;
    }

}
