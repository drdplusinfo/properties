<?php
namespace DrdPlus\Properties\RemarkableSenses;

use DrdPlus\Codes\PropertyCode;

class Smell extends RemarkableSenseProperty
{

    const SMELL = PropertyCode::SMELL;

    /**
     * @return Smell
     */
    public static function getIt()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return static::getEnum(self::SMELL);
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::SMELL;
    }

}