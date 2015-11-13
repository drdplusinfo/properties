<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Knack getIt(int $value)
 */
class Knack extends AbstractIntegerProperty implements BaseProperty
{
    const KNACK = PropertyCodes::KNACK;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::KNACK;
    }

}
