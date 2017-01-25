<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Agility;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Body\Height;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Calculations\SumAndRound;

class Speed extends AbstractDerivedProperty
{
    /**
     * @param Strength $strength
     * @param Agility $agility
     * @param Height $height
     * @return Speed
     */
    public static function getIt(Strength $strength, Agility $agility, Height $height)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(
            SumAndRound::average($strength->getValue(), $agility->getValue())
            + SumAndRound::ceil($height->getValue() / 3) - 2 // 1 -> 3 = -1; 4 -> 6 = 0; 7 -> 9 = +1 ...
        );
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::SPEED);
    }
}