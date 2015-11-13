<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Charisma getIt(int $value)
 */
class Charisma extends AbstractIntegerProperty implements BaseProperty
{
    const CHARISMA = PropertyCodes::CHARISMA;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CHARISMA;
    }

}
