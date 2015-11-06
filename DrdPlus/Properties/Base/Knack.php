<?php
namespace DrdPlus\Properties\Base;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * @method static Knack getIt(int $value)
 */
class Knack extends AbstractIntegerProperty implements BaseProperty
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
