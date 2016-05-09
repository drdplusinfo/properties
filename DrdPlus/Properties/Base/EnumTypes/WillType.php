<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class WillType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCodes::WILL
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const WILL = 'will';

    /**
     * @return string
     */
    public function getName()
    {
        return self::WILL;
    }
}
