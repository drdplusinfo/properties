<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class CharismaType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCode::CHARISMA
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const CHARISMA = 'charisma';

    /**
     * @return string
     */
    public function getName()
    {
        return self::CHARISMA;
    }
}
