<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Taste extends RemarkableSenseProperty
{

    /**
     * @return Taste|RemarkableSenseProperty
     */
    public static function getIt()
    {
        return static::getEnum(PropertyCode::TASTE);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::TASTE);
    }
}