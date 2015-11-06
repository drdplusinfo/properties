<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Strength getIt(int $value)
 * @see Property::getIt
 */
class Strength extends AbstractIntegerProperty implements BaseProperty
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
