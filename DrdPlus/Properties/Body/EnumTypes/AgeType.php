<?php
declare(strict_types=1);
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;
use DrdPlus\Codes\Properties\PropertyCode;

class AgeType extends IntegerEnumType
{
    const AGE = PropertyCode::AGE;

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::AGE;
    }
}