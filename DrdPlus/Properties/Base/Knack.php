<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Knack getIt(int $value)
 * @see Property::getIt
 */
class Knack extends AbstractIntegerProperty
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
