<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class WillType extends IntegerEnumType
{
    const WILL = PropertyCodes::WILL;

    /**
     * @return string
     */
    public function getName()
    {
        return self::WILL;
    }
}
