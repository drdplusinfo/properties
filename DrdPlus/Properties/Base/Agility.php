<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Agility getIt(int $value)
 */
class Agility extends AbstractIntegerProperty implements BaseProperty
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
