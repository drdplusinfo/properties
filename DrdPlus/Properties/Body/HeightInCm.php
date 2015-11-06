<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\AbstractFloatProperty;

/**
 * @method static HeightInCm getIt($value)
 */
class HeightInCm extends AbstractFloatProperty implements BodyProperty
{
    const HEIGHT_IN_CM = 'height_in_cm';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::HEIGHT_IN_CM;
    }

}
