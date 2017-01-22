<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class WillType extends IntegerEnumType
{
    const WILL = PropertyCode::WILL;

    /**
     * @return string
     */
    public function getName()
    {
        return self::WILL;
    }
}