<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Will getIt(int $value)
 * @see Property::getIt
 */
class Will extends AbstractIntegerProperty
{
    const WILL = 'will';

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WILL;
    }

}
