<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Agility getIt(int $value)
 */
class Agility extends AbstractIntegerProperty implements BaseProperty
{
    const AGILITY = PropertyCode::AGILITY;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::AGILITY;
    }

}
