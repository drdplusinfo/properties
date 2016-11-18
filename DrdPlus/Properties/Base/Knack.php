<?php
namespace DrdPlus\Properties\Base;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;

/**
 * @method static Knack getIt(int $value)
 */
class Knack extends AbstractIntegerProperty implements BaseProperty
{
    const KNACK = PropertyCode::KNACK;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::KNACK;
    }

}