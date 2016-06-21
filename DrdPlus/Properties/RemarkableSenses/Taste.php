<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Taste extends RemarkableSenseProperty
{

    const TASTE = PropertyCode::TASTE;

    /**
     * @return Taste
     */
    public static function getIt()
    {
        return static::createByValue(self::TASTE);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::TASTE;
    }
}
