<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tools\Calculations\SumAndRound;

class Endurance extends AbstractDerivedProperty
{
    const ENDURANCE = PropertyCode::ENDURANCE;

    public function __construct(Strength $strength, Will $will)
    {
        $this->value = SumAndRound::average($strength->getValue(), $will->getValue());
    }

    public function getCode()
    {
        return self::ENDURANCE;
    }
}
