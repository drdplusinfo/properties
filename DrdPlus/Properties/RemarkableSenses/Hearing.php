<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Hearing extends RemarkableSenseProperty
{

    const HEARING = PropertyCode::HEARING;

    /**
     * @return Hearing
     */
    public static function getIt()
    {
        return static::getEnum(self::HEARING);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::HEARING;
    }

}
