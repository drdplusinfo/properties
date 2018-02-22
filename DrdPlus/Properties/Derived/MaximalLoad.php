<?php
declare(strict_types=1);/** be strict for parameter types, https://www.quora.com/Are-strict_types-in-PHP-7-not-a-bad-idea */
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
    public static function getIt(Strength $strength, Athletics $athletics): MaximalLoad
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return new static($strength->getValue() + 21 + $athletics->getAthleticsBonus()->getValue());
    }

    /**
     * @return PropertyCode
     */
    public function getCode(): PropertyCode
    {
        return PropertyCode::getIt(PropertyCode::MAXIMAL_LOAD);
    }

}