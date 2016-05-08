<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class CharismaType extends IntegerEnumType
{
    const CHARISMA = PropertyCodes::CHARISMA;

    /**
     * @return string
     */
    public function getName()
    {
        return self::CHARISMA;
    }
}
