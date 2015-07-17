<?php
namespace DrdPlus\Properties\RemarkableSenses;

use Doctrineum\Strict\String\StrictStringEnum;

class Sight extends StrictStringEnum implements SenseInterface
{

    const SIGHT = 'sight';

    /**
     * @return self
     */
    public static function getIt()
    {
        return static::createByValue(self::SIGHT);
    }
}
