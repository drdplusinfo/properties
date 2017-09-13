<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\Properties\PropertyCode;

class Touch extends RemarkableSenseProperty
{

    /**
     * @return Touch|RemarkableSenseProperty
     */
    public static function getIt(): Touch
    {
        return static::getEnum(PropertyCode::TOUCH);
    }

    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::TOUCH);
    }
}