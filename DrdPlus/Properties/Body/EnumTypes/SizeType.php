<?php
declare(strict_types=1);
namespace DrdPlus\Properties\Body\EnumTypes;

use Doctrineum\Integer\IntegerEnumType;

class SizeType extends IntegerEnumType
{
    /**
     * should be the same as @see \DrdPlus\Codes\Properties\PropertyCode::SIZE
     * and can not be just linked to give direct return value and provide PhpStorm to-definition link support
     */
    const SIZE = 'size';

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::SIZE;
    }
}
