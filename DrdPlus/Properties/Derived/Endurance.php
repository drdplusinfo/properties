<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCodes;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Base\Will;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tools\Numbers\SumAndRound;

class Endurance extends AbstractDerivedProperty
{
    const ENDURANCE = PropertyCodes::ENDURANCE;

    public function __construct(Strength $strength, Will $will)
    {
        $this->value = SumAndRound::average($strength->getValue(), $will->getValue());
    }

    public function getCode()
    {
        return self::ENDURANCE;
    }
}
