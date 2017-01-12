<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCode;

class AgeType extends IntegerEnumType
{
    const AGE = PropertyCode::AGE;

    /**
     * @return string
     */
    public function getName()
    {
        return self::AGE;
    }
}