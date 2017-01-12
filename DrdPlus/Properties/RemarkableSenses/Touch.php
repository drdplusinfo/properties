<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Touch extends RemarkableSenseProperty
{

    /**
     * @return Touch|RemarkableSenseProperty
     */
    public static function getIt()
    {
        return static::getEnum(PropertyCode::TOUCH);
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::TOUCH);
    }
}