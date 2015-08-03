<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Strength getIt(int $value)
 * @see Property::getIt
 */
class Strength extends AbstractIntegerProperty
{
    const STRENGTH = 'strength';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::STRENGTH;
    }

}
