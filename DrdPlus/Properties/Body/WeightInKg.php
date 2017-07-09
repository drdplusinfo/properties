<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractFloatProperty;
use Granam\Number\NumberInterface;

/**
 * @method static WeightInKg getIt(float | NumberInterface $value)
 */
class WeightInKg extends AbstractFloatProperty implements BodyProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::WEIGHT_IN_KG);
    }

}