<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Hearing extends Parts\AbstractRemarkableSense
{

    const HEARING = 'hearing';

    /**
     * @return self
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
