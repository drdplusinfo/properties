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
        return static::createByValue(self::SIGHT);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SIGHT;
    }

}
