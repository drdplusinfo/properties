<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\AbstractIntegerProperty;

/**
 * In fact bonus of weight in kg, @see \DrdPlus\Tables\Measurements\Weight\WeightBonus
 *
 * @method static Weight getIt(int $value)
 */
class Weight extends AbstractIntegerProperty implements BodyProperty
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