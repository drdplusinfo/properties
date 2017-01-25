<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Codes\Properties\PropertyCode;

class NativeRegeneration extends NativeProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::NATIVE_REGENERATION);
    }
}