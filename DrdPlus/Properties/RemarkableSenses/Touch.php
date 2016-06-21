<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Touch extends RemarkableSenseProperty
{

    const TOUCH = PropertyCode::TOUCH;

    /**
     * @return Touch
     */
    public static function getIt()
    {
        return static::createByValue(self::TOUCH);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::TOUCH;
    }
}
