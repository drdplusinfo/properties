<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\AbstractFloatProperty;

/**
 * @method static Weight getIt(int $value)
 */
class Weight extends AbstractFloatProperty implements BodyProperty
{
    const WEIGHT = PropertyCode::WEIGHT;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WEIGHT;
    }

}
