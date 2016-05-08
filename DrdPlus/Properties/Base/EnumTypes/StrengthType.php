<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class StrengthType extends IntegerEnumType
{
    const STRENGTH = PropertyCodes::STRENGTH;

    /**
     * @return string
     */
    public function getName()
    {
        return self::STRENGTH;
    }
}
