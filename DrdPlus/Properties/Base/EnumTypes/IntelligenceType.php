<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class IntelligenceType extends IntegerEnumType
{
    const INTELLIGENCE = PropertyCodes::INTELLIGENCE;

    /**
     * @return string
     */
    public function getName()
    {
        return self::INTELLIGENCE;
    }
}
