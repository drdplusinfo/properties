<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Float\FloatEnumType;

class WeightInKgType extends FloatEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCode::WEIGHT_IN_KG
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const WEIGHT_IN_KG = 'weight_in_kg';

    /**
     * @return string
     */
    public function getName()
    {
        return self::WEIGHT_IN_KG;
    }
}
