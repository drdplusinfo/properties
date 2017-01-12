<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Smell extends RemarkableSenseProperty
{

    /**
     * @return Smell|RemarkableSenseProperty
     */
    public static function getIt()
    {
        return static::getEnum(PropertyCode::SMELL);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::SMELL);
    }

}