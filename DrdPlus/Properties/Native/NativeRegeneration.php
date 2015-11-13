<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Codes\PropertyCodes;

class NativeRegeneration extends NativeProperty
{
    const NATIVE_REGENERATION = PropertyCodes::NATIVE_REGENERATION;

    public function getCode()
    {
        return self::NATIVE_REGENERATION;
    }
}
