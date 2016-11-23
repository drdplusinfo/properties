<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Codes\PropertyCode;

class NativeRegeneration extends NativeProperty
{
    const NATIVE_REGENERATION = PropertyCode::NATIVE_REGENERATION;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::NATIVE_REGENERATION;
    }
}