<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCode;

class AgilityType extends IntegerEnumType
{
    const AGILITY = PropertyCode::AGILITY;

    /**
     * @return string
     */
    public function getName()
    {
        return self::AGILITY;
    }
}