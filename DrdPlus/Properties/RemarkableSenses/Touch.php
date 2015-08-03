<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Touch extends Parts\AbstractRemarkableSense
{

    const TOUCH = 'touch';

    /**
     * @return self
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
