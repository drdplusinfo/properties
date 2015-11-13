<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * Note: Size does not need to be persisted and therefore does not need enum type.
 * Can be anytime calculated by race, gender and strength at first level.
 * @see PPH page 33 left column
 */
/**
 * @method static Size getIt($value)
 */
class Size extends AbstractIntegerProperty implements BodyProperty
{
    const SIZE = PropertyCodes::SIZE;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SIZE;
    }

}
