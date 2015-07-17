<?php
namespace DrdPlus\Properties;
use DrdPlus\Properties\Parts\BaseProperty;

/**
 * @method static Charisma getIt(int $value)
 * @see Property::getIt
 */
class Charisma extends BaseProperty
{
    const CHARISMA = 'charisma';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CHARISMA;
    }


}
