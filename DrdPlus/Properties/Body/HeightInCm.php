<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Properties\AbstractFloatProperty;

class HeightInCm extends AbstractFloatProperty
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
