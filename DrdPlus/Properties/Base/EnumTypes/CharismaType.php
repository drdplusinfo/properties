<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class CharismaType extends IntegerEnumType
{
    const CHARISMA = PropertyCode::CHARISMA;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::CHARISMA;
    }
}