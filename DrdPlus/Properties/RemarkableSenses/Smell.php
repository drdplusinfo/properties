<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Smell extends RemarkableSenseProperty
{

    const SMELL = 'smell';

    /**
     * @return Smell
     */
    public static function getIt()
    {
        return static::createByValue(self::SMELL);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SMELL;
    }

}
