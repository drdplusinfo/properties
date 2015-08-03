<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Smell extends Parts\AbstractRemarkableSense
{

    const SMELL = 'smell';

    /**
     * @return self
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
