<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class StrengthType extends IntegerEnumType
{
    const STRENGTH = PropertyCode::STRENGTH;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::STRENGTH;
    }
}