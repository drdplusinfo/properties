<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Intelligence getIt(int $value)
 * @see Property::getIt
 */
class Intelligence extends AbstractIntegerProperty
{
    const INTELLIGENCE = 'intelligence';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::INTELLIGENCE;
    }

}
