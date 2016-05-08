<?php
namespace DrdPlus\Properties\Native\EnumTypes;

use Doctrineum\Boolean\BooleanEnumType;
use DrdPlus\Codes\PropertyCodes;

class InfravisionType extends BooleanEnumType
{
    const INFRAVISION = PropertyCodes::INFRAVISION;

    /**
     * @return string
     */
    public function getName()
    {
        return self::INFRAVISION;
    }
}
