<?php
declare(strict_types=1);

namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\BaseProperties\Strength;
use DrdPlus\BaseProperties\Will;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Calculations\SumAndRound;
use DrdPlus\Tables\Properties\EnduranceInterface;

class Endurance extends AbstractDerivedProperty implements EnduranceInterface
{
    /**
     * @param Strength $strength
     * @param Will $will
     * @return Endurance
     */
    public static function getIt(Strength $strength, Will $will): Endurance
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static(SumAndRound::average($strength->getValue(), $will->getValue()));
    }

    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::ENDURANCE);
    }
}