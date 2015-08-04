<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\AbstractFloatProperty;

class WeightInKg extends AbstractFloatProperty
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
