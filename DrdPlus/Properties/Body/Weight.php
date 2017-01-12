<?php
namespace DrdPlus\Properties\Body;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Partials\AbstractIntegerProperty;
use Granam\Integer\IntegerInterface;

/**
 * In fact bonus of weight in kg, @see \DrdPlus\Tables\Measurements\Weight\WeightBonus
 * @method static Weight getIt(int | IntegerInterface $value)
 * @method Weight add(int | IntegerInterface $value)
 * @method Weight sub(int | IntegerInterface $value)
 */
class Weight extends AbstractIntegerProperty implements BodyProperty
{
    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::WEIGHT);
    }

}