<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractFloatProperty;

/**
 * @method static WeightInKg getIt($value)
 */
class WeightInKg extends AbstractFloatProperty implements BodyProperty
{
    const WEIGHT_IN_KG = PropertyCodes::WEIGHT_IN_KG;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WEIGHT_IN_KG;
    }

}
