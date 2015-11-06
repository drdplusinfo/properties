<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\AbstractFloatProperty;

/**
 * @method static WeightInKg getIt($value)
 */
class WeightInKg extends AbstractFloatProperty implements BodyProperty
{
    const WEIGHT_IN_KG = 'weight_in_kg';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WEIGHT_IN_KG;
    }

}
