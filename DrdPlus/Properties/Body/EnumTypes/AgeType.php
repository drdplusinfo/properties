<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class AgeType extends IntegerEnumType
{
    const AGE = PropertyCodes::AGE;

    /**
     * @return string
     */
    public function getName()
    {
        return self::AGE;
    }
}