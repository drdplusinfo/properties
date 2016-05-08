<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Float\FloatEnumType;
use DrdPlus\Codes\PropertyCodes;

class WeightInKgType extends FloatEnumType
{
    const WEIGHT_IN_KG = PropertyCodes::WEIGHT_IN_KG;

    /**
     * @return string
     */
    public function getName()
    {
        return self::WEIGHT_IN_KG;
    }
}
