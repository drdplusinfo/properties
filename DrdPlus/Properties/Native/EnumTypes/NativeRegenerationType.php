<?php
namespace DrdPlus\Properties\Native\EnumTypes;

use Doctrineum\Boolean\BooleanEnumType;
use DrdPlus\Codes\PropertyCodes;

class NativeRegenerationType extends BooleanEnumType
{
    const NATIVE_REGENERATION = PropertyCodes::NATIVE_REGENERATION;

    /**
     * @return string
     */
    public function getName()
    {
        return self::NATIVE_REGENERATION;
    }
}
