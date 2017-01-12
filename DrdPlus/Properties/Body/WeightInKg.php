<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractFloatProperty;
use Granam\Number\NumberInterface;

/**
 * @method static WeightInKg getIt(float | NumberInterface $value)
 */
class WeightInKg extends AbstractFloatProperty implements BodyProperty
{
    const WEIGHT_IN_KG = PropertyCode::WEIGHT_IN_KG;

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::WEIGHT_IN_KG);
    }

}