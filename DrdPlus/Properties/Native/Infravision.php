<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Codes\PropertyCodes;

class Infravision extends NativeProperty
{
    const INFRAVISION = PropertyCodes::INFRAVISION;

    public function getCode()
    {
        return self::INFRAVISION;
    }
}
