<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Sight extends RemarkableSenseProperty
{

    /**
     * @return Sight|RemarkableSenseProperty
     */
    public static function getIt()
    {
        return static::getEnum(PropertyCode::SIGHT);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::SIGHT);
    }

}