<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Calculations\SumAndRound;

class Endurance extends AbstractDerivedProperty
{
    /**
     * @param Strength $strength
     * @param Will $will
     */
    public function __construct(Strength $strength, Will $will)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        parent::__construct(SumAndRound::average($strength->getValue(), $will->getValue()));
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::ENDURANCE);
    }
}