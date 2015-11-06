<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Sight extends RemarkableSenseProperty
{

    const SIGHT = 'sight';

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
