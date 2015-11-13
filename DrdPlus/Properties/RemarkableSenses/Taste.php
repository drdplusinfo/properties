<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCodes;

class Taste extends RemarkableSenseProperty
{

    const TASTE = PropertyCodes::TASTE;

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
