<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\Properties\PropertyCode;

class Smell extends RemarkableSenseProperty
{

    /**
     * @return Smell|RemarkableSenseProperty
     */
    public static function getIt(): Smell
    {
        return static::getEnum(PropertyCode::SMELL);
    }

    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::SMELL);
    }

}