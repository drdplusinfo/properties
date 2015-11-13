<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCodes;

class Hearing extends RemarkableSenseProperty
{

    const HEARING = PropertyCodes::HEARING;

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
