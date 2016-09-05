<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Strength getIt(int $value)
 * @see Property::getIt
 */
class Strength extends AbstractIntegerProperty implements BaseProperty
{
    const STRENGTH = PropertyCode::STRENGTH;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::STRENGTH;
    }

}