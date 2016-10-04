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
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getEnum(self::TASTE);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::TASTE;
    }
}