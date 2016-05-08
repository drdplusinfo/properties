<?php
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\PropertyCodes;

class SizeType extends IntegerEnumType
{
    const SIZE = PropertyCodes::SIZE;

    /**
     * @return string
     */
    public function getName()
    {
        return self::SIZE;
    }
}
