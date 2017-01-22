<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class KnackType extends IntegerEnumType
{
    const KNACK = PropertyCode::KNACK;

    /**
     * @return string
     */
    public function getName()
    {
        return self::KNACK;
    }
}