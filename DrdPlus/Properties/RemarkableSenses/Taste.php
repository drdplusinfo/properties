<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Taste extends RemarkableSenseProperty
{

    const TASTE = 'taste';

    /**
     * @return Taste
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
