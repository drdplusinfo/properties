<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Body\Height;
use DrdPlus\Properties\Derived\Parts\AbstractDerivedProperty;
use DrdPlus\Tools\Calculations\SumAndRound;

class Speed extends AbstractDerivedProperty
{
    const SPEED = PropertyCode::SPEED;

    public function __construct(Strength $strength, Agility $agility, Height $height)
    {
        $this->value = SumAndRound::average($strength->getValue(), $agility->getValue())
            + SumAndRound::ceil($height->getValue() / 3) - 2; // 1 - 3 = -1; 4 - 6 = 0; 7 - 9 = +1 ...
    }

    public function getCode()
    {
        return self::SPEED;
    }
}