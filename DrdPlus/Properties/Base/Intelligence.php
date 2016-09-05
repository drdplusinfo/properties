<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Intelligence getIt(int $value)
 */
class Intelligence extends AbstractIntegerProperty implements BaseProperty
{
    const INTELLIGENCE = PropertyCode::INTELLIGENCE;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::INTELLIGENCE;
    }

}