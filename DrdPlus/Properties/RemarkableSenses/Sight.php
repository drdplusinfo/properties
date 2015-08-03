<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Sight extends Parts\AbstractRemarkableSense
{

    const SIGHT = 'sight';

    /**
     * @return self
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
