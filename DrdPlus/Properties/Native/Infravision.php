<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Codes\PropertyCode;

class Infravision extends NativeProperty
{
    const INFRAVISION = PropertyCode::INFRAVISION;

    public function getCode()
    {
        return self::INFRAVISION;
    }
}
