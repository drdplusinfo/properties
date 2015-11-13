<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Will getIt(int $value)
 * @see Property::getIt
 */
class Will extends AbstractIntegerProperty implements BaseProperty
{
    const WILL = PropertyCodes::WILL;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WILL;
    }

}
