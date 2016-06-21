<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class AgeType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCode::AGE
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const AGE = 'age';

    /**
     * @return string
     */
    public function getName()
    {
        return self::AGE;
    }
}