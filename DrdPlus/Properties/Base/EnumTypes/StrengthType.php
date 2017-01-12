<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCode;

class StrengthType extends IntegerEnumType
{
    const STRENGTH = PropertyCode::STRENGTH;

    /**
     * @return string
     */
    public function getName()
    {
        return self::STRENGTH;
    }
}