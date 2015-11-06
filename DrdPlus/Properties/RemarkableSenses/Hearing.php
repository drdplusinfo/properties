<?php
namespace DrdPlus\Properties\RemarkableSenses;

class Hearing extends RemarkableSenseProperty
{

    const HEARING = 'hearing';

    /**
     * @return Hearing
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
