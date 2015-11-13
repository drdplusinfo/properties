<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractFloatProperty;

/**
 * @method static HeightInCm getIt($value)
 */
class HeightInCm extends AbstractFloatProperty implements BodyProperty
{
    const HEIGHT_IN_CM = PropertyCodes::HEIGHT_IN_CM;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::HEIGHT_IN_CM;
    }

}
