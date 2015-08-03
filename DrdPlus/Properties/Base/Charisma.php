<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Charisma getIt(int $value)
 * @see Property::getIt
 */
class Charisma extends AbstractIntegerProperty
{
    const CHARISMA = 'charisma';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CHARISMA;
    }

}
