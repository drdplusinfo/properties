<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class AgilityType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCode::AGILITY
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const AGILITY = 'agility';

    /**
     * @return string
     */
    public function getName()
    {
        return self::AGILITY;
    }
}
