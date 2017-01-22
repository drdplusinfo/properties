<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Partials\AbstractFloatProperty;
use Granam\Number\NumberInterface;

/**
 * @method static HeightInCm getIt(float | NumberInterface $value)
 */
class HeightInCm extends AbstractFloatProperty implements BodyProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::HEIGHT_IN_CM);
    }

}