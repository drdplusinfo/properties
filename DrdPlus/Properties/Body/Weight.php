<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\AbstractFloatProperty;

/**
 * @method static Weight getIt(int $value)
 */
class Weight extends AbstractFloatProperty implements BodyProperty
{
    const WEIGHT = PropertyCodes::WEIGHT;

    /**
     * @return string
     */
    public function getCode()
    {
        return self::WEIGHT;
    }

}
