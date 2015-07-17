<?php
namespace DrdPlus\Properties;

use DrdPlus\Properties\Parts\BaseProperty;

/**
 * @method static Agility getIt(int $value)
 * @see Property::getIt
 */
class Agility extends BaseProperty
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
