<?php
namespace DrdPlus\Properties\Native;

use DrdPlus\Codes\PropertyCode;

class Infravision extends NativeProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::INFRAVISION);
    }
}