<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Taste extends Parts\AbstractRemarkableSense
{

    const TASTE = 'taste';

    /**
     * @return self
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
