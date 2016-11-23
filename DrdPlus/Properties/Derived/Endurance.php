<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tools\Calculations\SumAndRound;

class Endurance extends AbstractDerivedProperty
{
    const ENDURANCE = PropertyCode::ENDURANCE;

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
     * @return string
     */
    public function getCode()
    {
        return self::ENDURANCE;
    }
}