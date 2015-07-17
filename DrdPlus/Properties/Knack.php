<?php
namespace DrdPlus\Properties;
use DrdPlus\Properties\Parts\BaseProperty;

/**
 * @method static Knack getIt(int $value)
 * @see Property::getIt
 */
class Knack extends BaseProperty
{
    const KNACK = 'knack';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::KNACK;
    }


}
