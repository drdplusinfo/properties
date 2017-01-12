<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCode;

class IntelligenceType extends IntegerEnumType
{
    const INTELLIGENCE = PropertyCode::INTELLIGENCE;

    /**
     * @return string
     */
    public function getName()
    {
        return self::INTELLIGENCE;
    }
}