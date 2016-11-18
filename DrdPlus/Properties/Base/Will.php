<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Will getIt(int $value)
 * @see Property::getIt
 */
class Will extends AbstractIntegerProperty implements BaseProperty
{
    const WILL = PropertyCode::WILL;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WILL;
    }

}