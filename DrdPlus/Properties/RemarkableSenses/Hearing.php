<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Hearing extends RemarkableSenseProperty
{

    /**
     * @return Hearing|RemarkableSenseProperty
     */
    public static function getIt()
    {
        return static::getEnum(PropertyCode::HEARING);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::HEARING);
    }

}