<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Agility getIt(int $value)
 * @see BaseProperty::getIt
 */
class Agility extends AbstractIntegerProperty
{
    const AGILITY = 'agility';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::AGILITY;
    }

}
