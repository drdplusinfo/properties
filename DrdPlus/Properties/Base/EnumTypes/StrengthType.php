<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class StrengthType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCode::STRENGTH
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const STRENGTH = 'strength';

    /**
     * @return string
     */
    public function getName()
    {
        return self::STRENGTH;
    }
}
