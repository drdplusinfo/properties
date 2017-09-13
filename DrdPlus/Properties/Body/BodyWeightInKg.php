<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractFloatProperty;
use Granam\Number\NumberInterface;

/**
 * @method static BodyWeightInKg getIt(float | NumberInterface $value)
 */
class BodyWeightInKg extends AbstractFloatProperty implements BodyProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::BODY_WEIGHT_IN_KG);
    }

}