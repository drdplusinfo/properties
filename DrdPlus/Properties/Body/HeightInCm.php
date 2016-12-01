<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractFloatProperty;
use Granam\Number\NumberInterface;

/**
 * @method static HeightInCm getIt(float|NumberInterface $value)
 */
class HeightInCm extends AbstractFloatProperty implements BodyProperty
{
    const HEIGHT_IN_CM = PropertyCode::HEIGHT_IN_CM;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::HEIGHT_IN_CM;
    }

}