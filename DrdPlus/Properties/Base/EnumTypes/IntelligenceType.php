<?php
namespace DrdPlus\Properties\Base\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class IntelligenceType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\PropertyCodes::INTELLIGENCE
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const INTELLIGENCE = 'intelligence';

    /**
     * @return string
     */
    public function getName()
    {
        return self::INTELLIGENCE;
    }
}
