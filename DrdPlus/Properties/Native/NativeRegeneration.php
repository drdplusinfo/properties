<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Properties\Native\Parts\AbstractNativeProperty;

class NativeRegeneration extends AbstractNativeProperty
{
    const NATIVE_REGENERATION = 'native_regeneration';

    public function getCode()
    {
        return self::NATIVE_REGENERATION;
    }
}
