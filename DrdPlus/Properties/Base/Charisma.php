<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Charisma getIt(int $value)
 */
class Charisma extends AbstractIntegerProperty implements BaseProperty
{
    const CHARISMA = PropertyCode::CHARISMA;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CHARISMA;
    }

}