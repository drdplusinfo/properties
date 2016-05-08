<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Float\FloatEnumType;
use DrdPlus\Codes\PropertyCodes;

class HeightInCmType extends FloatEnumType
{
    const HEIGHT_IN_CM = PropertyCodes::HEIGHT_IN_CM;

    /**
     * @return string
     */
    public function getName()
    {
        return self::HEIGHT_IN_CM;
    }
}
