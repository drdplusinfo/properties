<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class WeightType extends IntegerEnumType
{
    const WEIGHT = PropertyCodes::WEIGHT;

    /**
     * @return string
     */
    public function getName()
    {
        return self::WEIGHT;
    }
}
