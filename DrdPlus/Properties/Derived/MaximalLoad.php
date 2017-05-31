<?php
namespace DrdPlus\Properties\Derived;

use DrdPlus\Codes\Properties\PropertyCode;
use DrdPlus\Properties\Base\Strength;
use DrdPlus\Properties\Derived\Partials\AbstractDerivedProperty;

/**
 * See PPH page 114 left column, @link https://pph.drdplus.info/#nalozeni
 */
class MaximalLoad extends AbstractDerivedProperty
{
    /**
     * @param Strength $strength
     * @param Athletics $athletics
     * @return MaximalLoad
     */
    public static function getIt(Strength $strength, Athletics $athletics)
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($strength->getValue() + 21 + $athletics->getAthleticsBonus()->getValue());
    }

    /**
     * @return PropertyCode
     */
    public function getCode()
    {
        return PropertyCode::getIt(PropertyCode::MAXIMAL_LOAD);
    }

}