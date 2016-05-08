<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class AgilityType extends IntegerEnumType
{
    const AGILITY = PropertyCodes::AGILITY;

    /**
     * @return string
     */
    public function getName()
    {
        return self::AGILITY;
    }
}
