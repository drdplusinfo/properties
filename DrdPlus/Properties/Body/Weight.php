<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * In fact bonus of weight in kg, @see \DrdPlus\Tables\Measurements\Weight\WeightBonus
 *
 * @method static Weight getIt(int|IntegerInterface $value)
 * @method Weight add(int|IntegerInterface $value)
 * @method Weight sub(int|IntegerInterface $value)
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