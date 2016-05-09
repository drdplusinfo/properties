<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class KnackType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCodes::KNACK
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const KNACK = 'knack';

    /**
     * @return string
     */
    public function getName()
    {
        return self::KNACK;
    }
}
