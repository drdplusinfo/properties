<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Float\FloatEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class BodyWeightInKgType extends FloatEnumType
{
    const BODY_WEIGHT_IN_KG = PropertyCode::BODY_WEIGHT_IN_KG;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::BODY_WEIGHT_IN_KG;
    }
}