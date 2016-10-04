<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Sight extends RemarkableSenseProperty
{

    const SIGHT = PropertyCode::SIGHT;

    /**
     * @return Sight
     */
    public static function getIt()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getEnum(self::SIGHT);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SIGHT;
    }

}