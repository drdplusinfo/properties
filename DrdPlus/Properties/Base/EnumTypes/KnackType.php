<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class KnackType extends IntegerEnumType
{
    const KNACK = PropertyCodes::KNACK;

    /**
     * @return string
     */
    public function getName()
    {
        return self::KNACK;
    }
}
