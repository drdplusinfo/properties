<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Touch extends RemarkableSenseProperty
{

    const TOUCH = 'touch';

    /**
     * @return Touch
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
