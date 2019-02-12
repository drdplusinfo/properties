<?php
declare(strict_types=1);

namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\BaseProperties\Strength;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;
use DrdPlus\Tables\Properties\AthleticsInterface;

/**
 * See PPH page 114 left column, @link https://pph.drdplus.info/#nalozeni
 */
class MaximalLoad extends AbstractDerivedProperty
{
    /**
     * @param Strength $strength
     * @param AthleticsInterface $athletics
     * @return MaximalLoad
     */
    public static function getIt(Strength $strength, AthleticsInterface $athletics): MaximalLoad
    {
        return new static($strength->getValue() + 21 + $athletics->getAthleticsBonus()->getValue());
    }

    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::MAXIMAL_LOAD);
    }

}